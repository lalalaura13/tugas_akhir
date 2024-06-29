<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index () {
        $jadwal = Jadwal::all();
        return view('admin.jadwal', compact('jadwal'));
    }

    public function tambah_jadwal(Request $request) {

        $jadwal = new Jadwal();
        $jadwal->judul = $request->judul;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->waktu = $request->waktu;
        $jadwal->narahubung_1 = $request->narahubung_1;
        $jadwal->nohp_narhub_1 = $request->nohp_narhub_1;
        $jadwal->narahubung_2 = $request->narahubung_2;
        $jadwal->nohp_narhub_2 = $request->nohp_narhub_2;
        $jadwal->narahubung_3 = $request->narahubung_3;
        $jadwal->nohp_narhub_3 = $request->nohp_narhub_3;
        $jadwal->save();
        return redirect()->back()->with('success', 'Jadwal Berhasil ditambahkan');
    }

    public function update_jadwal(Request $request, $id) {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->judul = $request->judul;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->waktu = $request->waktu;
        $jadwal->narahubung_1 = $request->narahubung_1;
        $jadwal->nohp_narhub_1 = $request->nohp_narhub_1;
        $jadwal->narahubung_2 = $request->narahubung_2;
        $jadwal->nohp_narhub_2 = $request->nohp_narhub_2;
        $jadwal->narahubung_3 = $request->narahubung_3;
        $jadwal->nohp_narhub_3 = $request->nohp_narhub_3;
        $jadwal->save();

    return redirect()->back()->with('success', 'Jadwal Berhasil diperbarui');
    }

    public function delete_jadwal($id) {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}
