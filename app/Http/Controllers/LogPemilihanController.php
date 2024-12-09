<?php

namespace App\Http\Controllers;

use App\Models\LogPemilihan;
use Illuminate\Http\Request;

class LogPemilihanController extends Controller
{
    public function index()
    {
        $data = LogPemilihan::with('user')->get();
        return view('admin.logpemilihan.index',[
            'data' => $data
        ]);
    }
}
