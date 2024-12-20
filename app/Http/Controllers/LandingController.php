<?php

namespace App\Http\Controllers;

use App\Models\LogPemilihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function cekData(Request $request)
    {
        $request->validate(['no_anggota' => 'required']);

        $pemilih_exist = User::where('no_anggota', $request->no_anggota)->exists();

        if($pemilih_exist) 
        {
            return redirect()->route('landing')->with(['data-exist' => 'Data anda tercatat di DPT. Anda dapat melakukan voting']);
        }
        return redirect()->route('landing')->with(['not-found' => 'Data anda tidak tercatat. Silahkan hubungi panitia untuk mendaftar keanggotaan.']);

    }

    public function backToLanding()
    {
        Session::forget('validated_anggota');

        return redirect()->route('landing')->with(['success' => 'Anda telah kembali kehalaman utama anda. Sesi ada telah dihapus']);
    }

    public function validatedAnggota(Request $request) 
    {
        $request->validate([
            'no_anggota'=>'required'
        ]);

        // Identitas perangkat
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $cek_log = LogPemilihan::where('ip_address',$ipAddress)->where('user_agent',$userAgent)->first();

        if($cek_log)
        {
            return redirect()->route('landing')->with(['error' => 'Anda hanya dapat melakukan voting satu kali.']);
        }

        $anggota = User::with('pemilihan')->where('no_anggota', $request->no_anggota)->where('level', 'anggota')->first();

        if(!$anggota) 
        {
            return redirect()->route('landing')->with(['error' => 'Nomor anggota tidak valid atau tidak terdaftar. Harap cek kembali!']);
        }

        Session::put('validated_anggota', $anggota);
        Session::put('cek_device', $anggota->pemilihan);

        return redirect()->route('anggota.vote')
        ->with(['success' => 'Validasi berhasil. Anda dapat melakukan voting.']);
    }

    public function validatedDewan(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        // Identitas perangkat
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $cek_log = LogPemilihan::where('ip_address',$ipAddress)->where('user_agent',$userAgent)->first();

        if($cek_log)
        {
            return redirect()->route('landing')->with(['error' => 'Anda hanya dapat melakukan voting satu kali.']);
        }

        $anggota = User::with('pemilihan')->where('email', $request->email)->where('level', 'dewan')->first();

        if(!$anggota) 
        {
            return redirect()->route('landing')->with(['error' => 'Email tidak valid atau tidak terdaftar. Harap cek kembali!']);
        }

        Session::put('validated_anggota', $anggota);
        Session::put('cek_device', $anggota->pemilihan);

        return redirect()->route('anggota.vote')
        ->with(['success' => 'Validasi berhasil. Anda dapat melakukan voting.']);
    }

    public function formAnggota()
    {
        $data_anggota = Session::get('validated_anggota');
        $cek_device = Session::get('cek_device');
        $existing_anggota = LogPemilihan::where('pemilih_id', $data_anggota->id)->first();

        if ($existing_anggota) {
            Session::forget('validated_anggota');
            return redirect()->route('landing')->with('error', 'Anda sudah pernah melakukan voting. Hanya diperbolehkan voting satu kali.');
        }

        if($cek_device) {
            Session::forget('validated_anggota');
            return redirect()->route('landing')->with('error', 'Anda hanya diperkenankan untuk memvoting dengan satu device.');
        }

        if (!$data_anggota->status_keaktifan) {
            Session::forget('validated_anggota');
            return redirect()->route('landing')->with('error', 'Status keanggotaan anda tidak aktif. Anda tidak bisa melakukan voting');
        }

        return view('anggota.form', [
            'data_anggota' => $data_anggota
        ]);
    }

    public function anggotaVote(Request $request) 
    {
        $request->validate([
            'pilihan' => 'required|in:1,2,3,4',
        ]);

        $data_anggota = Session::get('validated_anggota');

        // Identitas perangkat
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');

        $existing_anggota = LogPemilihan::where('pemilih_id', $data_anggota->id)->first();
        $cek_device = LogPemilihan::where('ip_address',$ipAddress)->where('user_agent',$userAgent)->first();

        if($cek_device) {
            Session::forget('validated_anggota');
            return redirect()->route('landing')->with('error', 'Anda hanya diperkenankan untuk memvoting dengan satu device.');
        }

        if ($existing_anggota) {
            Session::forget('validated_anggota');
            return redirect()->route('landing')->with('error', 'Anda sudah pernah melakukan voting. Hanya diperbolehkan voting satu kali.');
        }

        LogPemilihan::create([
            'pemilih_id' => $data_anggota->id,
            'pilihan' => $request->pilihan,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'voted_at' => now()
        ]);

        User::where('id', $data_anggota->id)->update([
            'has_voted' => true
        ]);

        Session::forget('validated_anggota');

        return redirect()->route('landing')->with('success', 'Terimakasih! Suara anda sangat berharga untuk pemilihan ini.');
    }


}
