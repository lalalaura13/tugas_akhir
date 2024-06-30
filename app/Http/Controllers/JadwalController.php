<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function pendaftaran () {
        $jadwal = Jadwal::where('judul', 'Pendaftaran Online')->get();
        // dd($jadwal);
        return view('admin.jadwal-pendaftaran', compact('jadwal'));
    }

    public function tambah_jadwal_pendaftaran(Request $request) {

        $jadwal = new Jadwal();
        $jadwal->judul = 'Pendaftaran Online';
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

    public function update_jadwal_pendaftaran(Request $request, $id) {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->judul = 'Pendaftaran Online';
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

    public function tm () {
        $jadwal = Jadwal::where('judul', 'Technical Meeting')->get();
        // dd($jadwal);
        return view('admin.jadwal-tm', compact('jadwal'));
    }

    public function tambah_jadwal_tm(Request $request) {

        $jadwal = new Jadwal();
        $jadwal->judul = 'Technical Meeting';
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

    public function update_jadwal_tm(Request $request, $id) {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->judul = 'Technical Meeting';
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

    public function pelaksanaan () {
        $jadwal = Jadwal::where('judul', 'Waktu Dan Tempat Pelaksanaan')->get();
        // dd($jadwal);
        return view('admin.jadwal-pelaksanaan', compact('jadwal'));
    }

    public function tambah_jadwal_pelaksanaan(Request $request) {

        $jadwal = new Jadwal();
        $jadwal->judul = 'Waktu Dan Tempat Pelaksanaan';
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

    public function update_jadwal_pelaksanaan(Request $request, $id) {

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->judul = 'Waktu Dan Tempat Pelaksanaan';
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
