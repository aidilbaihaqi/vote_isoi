<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogPemilihan;
use App\Models\Setting;

class DashboardController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        $count_01 = LogPemilihan::where('pilihan',1)->count();
        $count_02 = LogPemilihan::where('pilihan',2)->count();
        $count_03 = LogPemilihan::where('pilihan',3)->count();
        $count_04 = LogPemilihan::where('pilihan',4)->count();
        return view('admin.dashboard', [
            'count_01' => $count_01,
            'count_02' => $count_02,
            'count_03' => $count_03,
            'count_04' => $count_04,
            'setting' => $setting
        ]);
    }

    public function toggleVoting(Request $request)
    {
        $setting = Setting::first();
        $setting->update(['voting_status' => $request->voting_status]);
        $setting->save();

        return redirect()->route('admin.dashboard')
        ->with(['success' => 'Status voting berhasil diubah!']);
    }
    
}
