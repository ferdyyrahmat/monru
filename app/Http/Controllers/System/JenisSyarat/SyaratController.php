<?php

namespace App\Http\Controllers\System\JenisSyarat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyaratController extends Controller
{
    public function index()
    {
        return view('pages.admin.jenisSyarat.syarat.index');
    }
}
