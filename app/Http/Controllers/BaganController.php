<?php

namespace App\Http\Controllers;

use App\Models\Bagan;
use App\Models\Detailpendaftaran;
use App\Models\Peserta;
use Illuminate\Http\Request;

class BaganController extends Controller
{

    public function form_bagan(){
        $baganPutraDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
        $baganPutriDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
        $baganPutraRemaja = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Remaja'")
                        ->get();
        $baganPutriRemaja = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Remaja'")
                        ->get();
        $baganPutraPra = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Pra'")
                        ->get();
        $baganPutriPra = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Pra'")
                        ->get();
        $baganPutraUsiaDini = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Usia'")
                        ->get();
        $baganPutriUsiaDini = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Usia'")
                        ->get();

        $jumlah = bagan::count();

        if (Auth()->user()->role_id == 1) {
            return view('admin.olah-bagan', 
            compact(
            'baganPutraDewasa', 'baganPutriDewasa', 'baganPutraRemaja', 'baganPutriRemaja',
            'baganPutraPra', 'baganPutriPra', 'baganPutraUsiaDini', 'baganPutriUsiaDini', 
            'jumlah'
        ));
        } else {
            return view('kolat.daftar-bagan', 
            compact(
            'baganPutraDewasa', 'baganPutriDewasa', 'baganPutraRemaja', 'baganPutriRemaja',
            'baganPutraPra', 'baganPutriPra', 'baganPutraUsiaDini', 'baganPutriUsiaDini', 
            'jumlah'
        ));
        }
    }

    public function daftar_bagan(){
        $baganPutraDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
        $baganPutriDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
        $baganPutraRemaja = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Remaja'")
                        ->get();
        $baganPutriRemaja = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Remaja'")
                        ->get();
        $baganPutraPra = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Pra'")
                        ->get();
        $baganPutriPra = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Pra'")
                        ->get();
        $baganPutraUsiaDini = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Usia'")
                        ->get();
        $baganPutriUsiaDini = bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Usia'")
                        ->get();

        $jumlah = bagan::count();
            return view('kolat.daftar-bagan', 
            compact(
            'baganPutraDewasa', 'baganPutriDewasa', 'baganPutraRemaja', 'baganPutriRemaja',
            'baganPutraPra', 'baganPutriPra', 'baganPutraUsiaDini', 'baganPutriUsiaDini', 
            'jumlah'
        ));
        
    }

    public function getatlet(Request $request) {
        $kategoriUsia = $request->kategoriUsia;
        $kelasTanding = $request->kelasTanding;
        $tingkatNafas = $request->tingkatNafas;
        $jenisKelamin = $request->jenisKelamin;
        $dewasaPutraDasarA = Peserta::select('peserta.nama_atlet', 'kelompok_latihan.nama_kontingen')
                        ->join('kelompok_latihan', 'peserta.kolat_id', '=', 'kelompok_latihan.id_kolat')
                        ->where('peserta.kategori_tanding', 'Tanding')
                        ->where('peserta.status', 'Sudah Terverifikasi')
                        ->where('peserta.kategori_usia', $kategoriUsia)
                        ->where('peserta.jenis_kelamin', $jenisKelamin)
                        ->where('peserta.kelas_tanding', $kelasTanding);

                        if ($request->kategoriUsia == 'Pra Remaja (SMP)' || $request->kategoriUsia == 'Usia Dini (Kelas 3-6 SD)') {
                            $dewasaPutraDasarA->where('peserta.tingkat_nafas', '-');
                        } else {
                            $dewasaPutraDasarA->where('peserta.tingkat_nafas', $tingkatNafas);
                        }

                        $dewasaPutraDasarA = $dewasaPutraDasarA->get();

        foreach ($dewasaPutraDasarA as $item) {
            echo "<option value='$item->nama_atlet ($item->nama_kontingen)'>$item->nama_atlet ($item->nama_kontingen)</option>";
        }
    }

    public function tambah_bagan(Request $request)
    {
        // Mendapatkan tim dari request
        $sudut_merah = $request->input('sudut_merah');
        $sudut_biru = $request->input('sudut_biru');

        // Tambahkan "Bye" jika jumlah tim tidak seimbang
        while (count($sudut_merah) > count($sudut_biru)) {
            $sudut_biru[] = 'Bye';
        }

        while (count($sudut_biru) > count($sudut_merah)) {
            $sudut_merah[] = 'Bye';
        }

        bagan::create([
            'kategori' => $request->kelas_tanding . ' ' . $request->jenis_kelamin . ' ' . $request->kategori_usia . ' ' . $request->tingkat_nafas,
            'sudut_merah' => json_encode($sudut_merah),
            'sudut_biru' => json_encode($sudut_biru),
        ]);

        return redirect()->back()->with('success', 'bagan berhasil ditambahkan.');
    }

    public function delete_bagan($id)
    {
        $bagan = bagan::findOrFail($id);
        $bagan->delete();

        return redirect()->back()->with('success', 'bagan berhasil dihapus');
    }
}
