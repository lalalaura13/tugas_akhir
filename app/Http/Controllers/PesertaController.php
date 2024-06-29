<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function table_atlet() {

        $peserta = Peserta::all();
        $verified = Peserta::where('status', 'Sudah Terverifikasi')->get();
        $notverified = Peserta::where('status', 'Belum Terverifikasi')->get();

        return view('admin.data-atlet', compact('peserta', 'verified', 'notverified'));
    }

    public function verified_atlet($id)
    {
        $atlet = Peserta::findOrFail($id);
        $atlet->status = 'Sudah Terverifikasi';
        $atlet->save();

        return redirect()->back()->with('success', 'Atlet berhasil terverifikasi');
    }
}
