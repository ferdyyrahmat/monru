<?php

namespace App\Services;

use App\Http\Controllers\AuthController;
use App\Models\FormOutstanding;
use App\Models\User;
use App\Models\UserOutstanding;
use DB;
use Hash;
use Log;

/**
 * Class VerifyOutstanding.
 */
class VerifyOutstanding
{
    public function handle($kredensil, $request, $logData)
    {
        $user = User::where('email', $request->email)->first();
        if (!empty($user) && $user->jobLvl == 'Administrator') {
            # code...
            $password = $user->password;
            if (password_verify($kredensil['password'], $password)) {
                $logDataA = [
                    'model' => null,
                    'model_id' => null,
                    'user_id' => $user->id,
                    'userEmail' => $kredensil['email'],
                    'action' => 'VERIFY',
                    'description' => 'Berhasil Verifikasi Data Monitoring',
                    'old_data' => null,
                    'new_data' => null,
                ];
                (new LogService)->handle($logDataA);
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
            $authController = new AuthController();
            $data = $authController->hris($request);
            if (empty($data['accessToken']) || $data['accessToken'] == null) {
                
                (new LogService)->handle($logData);

                return response()->json([
                    'success' => false,
                    'message' => $data ?? 'Response Not Found',
                ]);
            } else {
                # code...
                $userData = $authController->getAccount($data, $request);
                $user = User::query()
                    ->where('email', $kredensil['email'])
                    ->first();

                $checkUser = UserOutstanding::query()
                    ->where('nik', $userData['employeId'])
                    ->exists();

                if (!$checkUser) {
                    $logData1 = [
                        'model' => FormOutstanding::class,
                        'model_id' => null,
                        'user_id' => $user->id,
                        'userEmail' => $kredensil['email'],
                        'action' => 'VERIFY',
                        'description' => 'Gagal verifikasi data, Bukan Verifikator',
                        'new_data' => null,
                        'old_data' => null,
                    ];
                    (new LogService)->handle($logData1);

                    return response()->json([
                        'success' => false,
                        'message' => 'User bukan verifikator',
                    ], 403);
                }

                (new LogService)->handle($logData);

                return response()->json([
                    'success' => true,
                    'id' => $user->id,
                    'verifikator' => $kredensil['email']
                ]);
            }
        }
    }
}
