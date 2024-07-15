<?php

namespace App\Http\Controllers;

use App\Models\Bagan;
use App\Models\DetailBagan;
use App\Models\Detailpendaftaran;
use App\Models\Peserta;
use Illuminate\Http\Request;

class BaganController extends Controller
{

    public function form_bagan(){
        $baganPutraDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putra'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
                        // dd($baganPutraDewasa);
        $baganPutriDewasa = Bagan::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 3), ' ', -1) = 'Putri'")
                        ->whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(kategori, ' ', 4), ' ', -1) = 'Dewasa'")
                        ->get();
                        // dd($baganPutriDewasa);
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
        $detail = DetailBagan::all();
        $jumlah = bagan::count();

        if (Auth()->user()->role_id == 1) {
            return view('admin.olah-bagan', 
            compact(
                'detail',
            'baganPutraDewasa', 'baganPutriDewasa', 'baganPutraRemaja', 'baganPutriRemaja',
            'baganPutraPra', 'baganPutriPra', 'baganPutraUsiaDini', 'baganPutriUsiaDini', 
            'jumlah'
        ));
        } else {
            return view('kolat.daftar-bagan', 
            compact(
                'detail',
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

        $detail = DetailBagan::all();
        $jumlah = bagan::count();
            return view('kolat.daftar-bagan', 
            compact(
                'detail',
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
        // dd($sudut_merah);

         // Buat entri baru di tabel bagan
        $bagan = new Bagan;
        $bagan->kategori = $request->kelas_tanding . ' ' . $request->jenis_kelamin . ' ' . $request->kategori_usia . ' ' . $request->tingkat_nafas;
        $bagan->save();
        
        // Menyesuaikan jumlah sudut merah dan sudut biru
        $count_merah = count($sudut_merah);
        $count_biru = count($sudut_biru);

        if ($count_merah > $count_biru) {
            for ($i = $count_biru; $i < $count_merah; $i++) {
                $sudut_biru[] = "Bye";
            }
        } elseif ($count_biru > $count_merah) {
            for ($i = $count_merah; $i < $count_biru; $i++) {
                $sudut_merah[] = "Bye";
            }
        }

        // Iterasi melalui array dan menyimpan data ke tabel detail_bagan
        foreach ($sudut_merah as $index => $merah) {
            $detail = new DetailBagan;
            $detail->sudut_merah = $merah;
            $detail->sudut_biru = $sudut_biru[$index];
            $detail->bagan_id = $bagan->id;
            $detail->save();
        }

        return redirect()->back()->with('success', 'bagan berhasil ditambahkan.');
    }

    public function delete_bagan($id)
    {
        $bagan = bagan::findOrFail($id);
        DetailBagan::where('bagan_id', $bagan->id)->delete();
        $bagan->delete();

        return redirect()->back()->with('success', 'bagan berhasil dihapus');
    }

    public function detail($id)
    {
        $id = $id;
        $detailBagan = DetailBagan::where('bagan_id', $id)->get();
        return view('bagan.detail-bagan', compact('detailBagan', 'id'));
    }

    public function update_bagan(Request $request, $id)
    {
        // Ambil data Bagan
        // Ambil data Bagan
        $bagan = Bagan::findOrFail($id);

        // Ambil semua detail bagan untuk bagan ini
        $detailBagan = DetailBagan::where('bagan_id', $bagan->id)->get();

        // Update setiap detail bagan
        foreach ($detailBagan as $detail) {
            // Update data untuk sudut merah
            $detail->Juri_1_merah = $request->input('juri1_merah.' . $detail->id);
            $detail->Juri_2_merah = $request->input('juri2_merah.' . $detail->id);
            $detail->Juri_3_merah = $request->input('juri3_merah.' . $detail->id);
            $detail->Juri_4_merah = $request->input('juri4_merah.' . $detail->id);
            $detail->skor_1_merah = $request->input('skor1_merah.' . $detail->id);
            $detail->skor_2_merah = $request->input('skor2_merah.' . $detail->id);
            $detail->skor_3_merah = $request->input('skor3_merah.' . $detail->id);
            $detail->skor_4_merah = $request->input('skor4_merah.' . $detail->id);

            // Hitung total skor merah
            $totalSkorMerah = $detail->skor_1_merah + $detail->skor_2_merah + $detail->skor_3_merah + $detail->skor_4_merah;
            $detail->total_skor_merah = $totalSkorMerah;

            // Update data untuk sudut biru
            $detail->Juri_1_biru = $request->input('juri1_biru.' . $detail->id);
            $detail->Juri_2_biru = $request->input('juri2_biru.' . $detail->id);
            $detail->Juri_3_biru = $request->input('juri3_biru.' . $detail->id);
            $detail->Juri_4_biru = $request->input('juri4_biru.' . $detail->id);
            $detail->skor_1_biru = $request->input('skor1_biru.' . $detail->id);
            $detail->skor_2_biru = $request->input('skor2_biru.' . $detail->id);
            $detail->skor_3_biru = $request->input('skor3_biru.' . $detail->id);
            $detail->skor_4_biru = $request->input('skor4_biru.' . $detail->id);

            // Hitung total skor biru
            $totalSkorBiru = $detail->skor_1_biru + $detail->skor_2_biru + $detail->skor_3_biru + $detail->skor_4_biru;
            $detail->total_skor_biru = $totalSkorBiru;

            // Simpan perubahan
            $detail->save();
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
}