<?php

namespace App\Http\Controllers;

use App\Models\LogPemilihan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $count_01 = LogPemilihan::where('pilihan',1)->count();
        $count_02 = LogPemilihan::where('pilihan',2)->count();
        $count_03 = LogPemilihan::where('pilihan',3)->count();
        $count_04 = LogPemilihan::where('pilihan',4)->count();

        $all_count = LogPemilihan::all()->count();
        return view('landing', [
            'count_01' => $count_01,
            'count_02' => $count_02,
            'count_03' => $count_03,
            'count_04' => $count_04,
            'all_count' => $all_count
        ]);
    }
}
