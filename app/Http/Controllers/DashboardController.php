<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KelompokLatihan;
use App\Models\Medali;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardK() 
    {
        $jadwal = Jadwal::all();
        $akun = Auth::user();
        $user = KelompokLatihan::where('user_id', $akun->id)->first();
        $medali = Medali::all();

        return view('kolat.dashboard', compact('user', 'jadwal', 'akun', 'medali'));
    }

    public function dashboardA()
    {
        $countK = User::where('role_id', 2)->count();
        $countA = Peserta::count();

        return view('admin.dashboard', compact('countK', 'countA'));
    }

    public function coba() {
        $user = User::all();
        return view('coba', compact('user'));
    }
}
