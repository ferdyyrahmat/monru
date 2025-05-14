<?php

namespace App\Http\Controllers\System\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRevisiController extends Controller
{
    public function getTableData(Request $request)
    {

    }
    
    public function index()
    {
        return view('pages.admin.user.revisi.index');
    }
}
