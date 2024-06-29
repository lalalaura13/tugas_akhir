<?php

namespace App\Http\Controllers;

use App\Models\Detailpendaftaran;
use Illuminate\Http\Request;

class DetailPendaftaranController extends Controller
{
    public function table_atlet() {

        $detail = Detailpendaftaran::all();
        $verified = Detailpendaftaran::where('status', 'Sudah Terverifikasi')->get();
        $notverified = Detailpendaftaran::where('status', 'Belum Terverifikasi')->get();

        return view('admin.data-atlet', compact('detail', 'verified', 'notverified'));
    }

    public function verified_atlet($id)
    {
        $atlet = Detailpendaftaran::findOrFail($id);
        $atlet->status = 'Sudah Terverifikasi';
        $atlet->save();

        return redirect()->back()->with('success', 'Atlet berhasil terverifikasi');
    }
}
