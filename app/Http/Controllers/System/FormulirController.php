<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\FormPengukuran;
use App\Models\RuanganAlat;
use App\Models\SubDepartment;
use App\Models\User;
use App\Services\LogService;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Log;
use Validator;

class FormulirController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $id_dept = $request->id_dept;
            $ruangan = RuanganAlat::query()
                                    ->where('id_sub_department', $id_dept)
                                    ->get();

            return response()->json([
                'success' => true,
                'ruangan' =>$ruangan 
            ]);
        }

        $dept = SubDepartment::with('departments')->get();
        
        return view('pages.formulir.index', compact('dept'));
    }

    public function create()
    {
        return view('system.formulir.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'id_sub_department' => 'required|exists:sub_departments,id',
            'id_ruangan' => 'required|exists:ruangan_alats,id', // Adjust according to your database structure
            'suhu' => 'required|numeric',
            'suhu_min' => 'required|numeric',
            'suhu_max' => 'required|numeric',
            'rh' => 'required|numeric',
            'dp' => 'required|numeric',
            'id_pelaksana' => 'required|exists:users,id',
            'id_verifikator' => 'nullable|exists:users,id', // Optional if not verified yet
            'alasan' => 'nullable|string', // Only required if jenisMonitoring is 'edit'
        ]);

        // Create a new form entry
        $form = new FormPengukuran();
        $form->id_sub_department = $request->id_sub_department;
        $form->id_ruangan = $request->id_ruangan; // Adjust according to your database structure
        $form->suhu = $request->suhu;
        $form->suhu_min = $request->suhu_min;
        $form->suhu_max = $request->suhu_max;
        $form->rh = $request->rh;
        $form->dp = $request->dp;
        $form->id_pelaksana = $request->id_pelaksana;
        $form->id_verifikator = $request->id_verifikator; // This can be null if not verified yet
        $form->alasan = $request->alasan; // Only filled if jenisMonitoring is 'edit'
        $form->save();

        // Return a response
        return response()->json([
            'success' => true,
            'message' => 'Formulir Pengukuran Berhasil dibuat',
            'redirect' => route('v1.dashboard')
        ]);
    }

    public function edit($id)
    {
        return view('system.formulir.edit', compact('id'));
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Masukan Email Onekalbe',
            'email.email' => 'Email Tidak Valid',
            'password.required' => 'Masukan Password'
        ]);

        // Membuat array $kredensil langsung
        $kredensil = $request->only('email', 'password');

        // check User
        $user = User::where('email', $request->email)->first();
        if (!empty($user) && $user->jobLvl == 'Administrator') {
            # code...
            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                $logData = [
                    'model' => null,
                    'model_id' => null,
                    'user_id' => $user->id,
                    'userEmail' => $kredensil['email'],
                    'action' => 'VERIFY',
                    'description' => 'Berhasil Verifikasi Data Monitoring',
                    'old_data' => null,
                    'new_data' => null,
                ];
                (new LogService)->handle($logData);
                return response()->json([
                    'success' => true,
                    'id' => $user->id,
                    'verifikator' => $kredensil['email'],
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Verifikasi Gagal Silahkan Ulangi!',
                ]);
            }
        } else {
            $data = $this->hris($request);
            if (empty($data['accessToken']) || $data['accessToken'] == null) {
                $logData = [
                    'model' => null,
                    'model_id' => null,
                    'user_id' => null,
                    'userEmail' => $kredensil['email'],
                    'action' => 'VERIFY',
                    'description' => 'Salah Email atau Password',
                    'old_data' => null,
                    'new_data' => null,
                ];
                (new LogService)->handle($logData);

                return response()->json([
                    'success' => false,
                    'message' => $data ?? 'Response Not Found',
                ]);
            } else {
                # code...
                $this->getAccount($data, $request);

                if (Auth::attempt($kredensil)) {
                    $user = Auth::user();

                    $logData = [
                        'model' => null,
                        'model_id' => null,
                        'user_id' => $user->id,
                        'userEmail' => $kredensil['email'],
                        'action' => 'VERIFY',
                        'description' => 'Berhasil Verifikasi Data Monitoring',
                        'old_data' => null,
                        'new_data' => null,
                    ];
                    (new LogService)->handle($logData);

                    return response()->json([
                        'success' => true,
                        'id' => $user->id,
                        'verifikator' => $kredensil['email']
                    ]);
                } else {
                    $logData = [
                        'model' => null,
                        'model_id' => null,
                        'user_id' => $user->id,
                        'userEmail' => $kredensil['email'],
                        'action' => 'VERIFIY',
                        'description' => 'Gagal Memverifikasi Data Monitoring',
                        'old_data' => null,
                        'new_data' => null,
                    ];
                    (new LogService)->handle($logData);

                    return response()->json([
                        'success' => false,
                        'message' => 'Verifikasi Gagal Silahkan Ulangi'
                    ]);
                }
            }
        }
    }
    private function getAccount($data, $request)
    {
        try {
            DB::beginTransaction();

            $response = explode('.', $data['accessToken']);
            $result = base64_decode($response[1]);
            $response = json_decode($result, true);
            $check = User::where('employeId', $response['NIK'])->first();

            $resultJson = json_encode($response);

            if (empty($check)) {
                # code...
                User::create([
                    'employeId' => $response['NIK'],
                    'fullname' => $response['Name'],
                    'email' => $request->email,
                    'phone' => $response['EmpHandPhone'] ?? 'NA',
                    'empTypeGroup' => $response['EmpTypeGroup'],
                    'email_backup' => $response['Email'],
                    'jobLvl' => $response['JobLvlName'],
                    'jobTitle' => $response['JobTtlName'],
                    'groupName' => $response['DivName'],
                    'groupKode' => $response['DivCode'],
                    'password' => Hash::make($request->password),
                    'result' => $resultJson
                ]);
            } else {
                $check->update([
                    'employeId' => $response['NIK'],
                    'fullname' => $response['Name'],
                    'email' => $request->email,
                    'phone' => $response['EmpHandPhone'] ?? 'NA',
                    'empTypeGroup' => $response['EmpTypeGroup'],
                    'email_backup' => $response['Email'],
                    'jobLvl' => $response['JobLvlName'],
                    'jobTitle' => $response['JobTtlName'],
                    'groupName' => $response['DivName'],
                    'groupKode' => $response['DivCode'],
                    'password' => Hash::make($request->password),
                    'result' => $resultJson
                ]);
            }

            DB::commit();
            return [
                'employeId' => $response['NIK'],
                'fullname' => $response['Name'],
                'email' => $request->email,
                'phone' => $response['EmpHandPhone'] ?? 'NA',
                'empTypeGroup' => $response['EmpTypeGroup'],
                'email_backup' => $response['Email'],
                'jobLvl' => $response['JobLvlName'],
                'jobTitle' => $response['JobTtlName'],
                'groupName' => $response['DivName'],
                'groupKode' => $response['DivCode'],
            ];
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            DB::rollBack();
            return null;
        }
    }
    private function hris($request)
    {
        $credentials = [
            'username' => $request->email,
            'password' => $request->password,
            'getprofile' => true
        ];

        // Kirim permintaan ke endpoint API login

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api-global-it-pharma-production-3scale-apicast-staging.apps.alpha.kalbe.co.id/api/v1/GlobalLogin/Login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($credentials),
            CURLOPT_HTTPHEADER => array(
                'app_id: a8ecd84f',
                'app_key: 1cb9d7c6d267a904ab461ad65d49458e',
                'Content-Type: application/json',
                'X-API-Key: SQA45CsPgqRCeyoO0ZzeKK6BFG1vpR1vy7r-gvPiEw4'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $token = json_decode($response, true);
        return $token;
    }
}
