<?php

namespace App\Http\Controllers;

use App\Models\KelompokLatihan;
use App\Models\Peserta;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use setasign\Fpdi\Tcpdf\Fpdi;
use ZipArchive;
use TCPDF_FONTS;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikat = Sertifikat::all();
        $kolat = KelompokLatihan::all();
        return view('admin.olah-sertifikat', compact('sertifikat', 'kolat'));
    }

    public function detail($id_kolat)
    {
        $detail = Sertifikat::where('kolat_id', $id_kolat)->get();
        $namaKolat = KelompokLatihan::findOrFail($id_kolat)->nama_kontingen;

        return view('admin.detail-sertifikat', compact('detail', 'namaKolat'));
    }

    public function index_kolat()
    {
        // $id = Auth()->user()->id;
        $userId = auth()->user()->id;
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $sertifikat = Sertifikat::where('kolat_id', $kolatId)->get();

        return view('kolat.daftar-sertifikat', compact('sertifikat'));
    }

    public function getatlet(Request $request)
    {
        $kategoriTanding = $request->kategoriTanding;
        $kategoriUsia = $request->kategoriUsia;
        $kelasTanding = $request->kelasTanding;
        $tingkatNafas = $request->tingkatNafas;
        $jenisKelamin = $request->jenisKelamin;

        $query = Peserta::select('peserta.nama_atlet', 'kelompok_latihan.nama_kontingen')
            ->join('kelompok_latihan', 'peserta.kolat_id', '=', 'kelompok_latihan.id_kolat')
            ->where('peserta.kategori_tanding', $kategoriTanding)
            ->where('peserta.status', 'Sudah Terverifikasi')
            ->where('peserta.kategori_usia', $kategoriUsia)
            ->where('peserta.jenis_kelamin', $jenisKelamin);

        if ($kategoriTanding == 'Tanding') {
            $query->where('peserta.kelas_tanding', $kelasTanding);

            if (in_array($kategoriUsia, ['Pra Remaja (SMP)', 'Usia Dini (Kelas 3-6 SD)'])) {
                $query->where('peserta.tingkat_nafas', '-');
            } else {
                $query->where('peserta.tingkat_nafas', $tingkatNafas);
            }
        } elseif (in_array($kategoriTanding, ['Seni Tunggal', 'Getaran'])) {
            $query->where('peserta.kelas_tanding', '-')
                ->where('peserta.tingkat_nafas', '-');
        }

        $atletList = $query->get();

        echo "<option value=''>-- Pilih Atlet --</option>";
        foreach ($atletList as $item) {
            echo "<option value='{$item->nama_atlet} ({$item->nama_kontingen})'>{$item->nama_atlet} ({$item->nama_kontingen})</option>";
        }
    }

    public function generate_sertifikat(Request $request)
    {

        // Data untuk sertifikat
        $reqAtlet = explode(' (', $request->atlet);
        $reqKategori = explode(' (', $request->kategori_usia);

        $atlet = trim($reqAtlet[0]);
        $juara = $request->juara;
        if ($request->kategori_tanding == 'Tanding') {
            $kelas = $request->kelas_tanding;
        } else {
            $kelas = $request->kategori_tanding;
        }

        $kategori = trim($reqKategori[0]) . ' ' . $request->tingkat_nafas;

        // Inisialisasi PDF dengan mode landscape
        $pdf = new Fpdi('L', 'mm', 'A4');

        // Tambahkan halaman
        $pdf->AddPage();

        // Atur sumber file PDF template
        $path = public_path('sertifikat/sertifikat.pdf');
        $pdf->setSourceFile($path);

        // Import halaman 1
        $tplIdx = $pdf->importPage(1);

        // Gunakan template dan sesuaikan ukurannya
        $pdf->useTemplate($tplIdx, 0, 0, 297);

        // Mengatur font
        $fontAria = TCPDF_FONTS::addTTFfont(public_path('ArimaMadurai-Regular.ttf'), 'TrueTypeUnicode', '', 96);
        if (!$fontAria) {
            dd('tidak ada');
        }
        $pdf->SetFont($fontAria, '', 40);
        $pdf->SetTextColor(183, 180, 81);

        // Mengukur lebar teks
        $textWidth = $pdf->GetStringWidth($atlet);

        // Menghitung posisi awal teks agar berada di tengah
        $startX = (297 - $textWidth) / 2;

        // Mengatur posisi teks berdasarkan lebar teks
        $pdf->SetXY($startX, 65);

        // Menambahkan teks ke sertifikat (nama, tanggal, dll.)
        $pdf->Write(0, $atlet);

        // SETTING KATEGORI

        $fontBree = TCPDF_FONTS::addTTFfont(public_path('BreeSerif-Regular.ttf'), 'TrueTypeUnicode', '', 96);

        $pdf->SetFont($fontBree, '', 20);
        $pdf->SetTextColor(0, 0, 0);

        // Menambahkan teks kategori ke sertifikat dan memposisikan di tengah
        $categories = [$juara, $kelas, $kategori];
        $yPosition = 91;
        foreach ($categories as $category) {
            $pdf->SetXY((297 - $pdf->GetStringWidth($category)) / 2, $yPosition);
            $pdf->Write(0, $category);
            $yPosition += 8; // Menambahkan jarak vertikal antara baris
        }

        // Menyimpan file sertifikat PDF ke folder storage/app/public/sertifikat
        $filename = 'sertifikat_' . $atlet .  ' ' . $request->juara . '.pdf';
        $storagePath = storage_path('app/public/sertifikat/' . $filename);

        // Pastikan direktori tujuan ada
        if (!file_exists(storage_path('app/public/sertifikat'))) {
            mkdir(storage_path('app/public/sertifikat'), 0755, true);
        }

        $pdf->Output($storagePath, 'F');

        // Simpan path ke database

        // Mengambil kata yang ada di dalam kurung ( ... )
        $startPos = strpos($request->atlet, '(');
        $endPos = strpos($request->atlet, ')');

        $namaKontingen = trim(substr($request->atlet, $startPos + 1, $endPos - $startPos - 1));
        $idKolat = KelompokLatihan::where('nama_kontingen', $namaKontingen)->first()->id_kolat;

        $sertifikat = new Sertifikat();
        $sertifikat->atlet = $atlet;
        $sertifikat->kolat_id = $idKolat;
        $sertifikat->kategori = $request->kategori_tanding . ' ' . $kategori . ' ' . $request->jenis_kelamin . ' ' . $request->kelas_tanding;
        $sertifikat->juara = $request->juara;
        $sertifikat->path = '/storage/sertifikat/' . $filename;
        $sertifikat->save();

        return redirect()->back()->with('success', 'Sertifikat berhasil ditambahkan');
    }

    

    public function delete_sertifikat($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $path = $sertifikat->path;
        $path = str_replace('/storage/', '/public/', $path);
        // dd($path);
        Storage::delete($path);
        $sertifikat->delete();

        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus');
    }

    public function donwloadAll()
    {
        $namaKontingen = Auth()->user()->nama_kontingen;

        $files = Sertifikat::pluck('path')->toArray();

        // Nama dan path file ZIP yang akan dibuat
        $zipFileName = $namaKontingen . '_all_sertifikat.zip';
        $zipFilePath = storage_path('app/public/sertifikat/' . $zipFileName);
        // dd($zipFilePath);

        // Membuat instance dari ZipArchive
        $zip = new ZipArchive;

        // Membuka (atau membuat) file ZIP
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $filePath = storage_path('app/public/sertifikat/' . basename($file));
                // dd($filePath);

                // Memeriksa apakah file ada sebelum menambahkannya ke ZIP
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($file));
                } else {
                    // Tambahkan log atau debug statement jika file tidak ditemukan
                    echo "File tidak ditemukan: " . $filePath . "\n";
                }
            }
            // Menutup file ZIP setelah semua file ditambahkan
            $zip->close();
        } else {
            return response()->json(['error' => 'Tidak dapat membuat file ZIP'], 500);
        }

        // Memeriksa apakah file ZIP berhasil dibuat
        if (file_exists($zipFilePath)) {
            // Mengembalikan respon download untuk file ZIP yang telah dibuat
            return response()->download($zipFilePath);
        } else {
            // Mengembalikan pesan kesalahan jika file ZIP tidak ditemukan
            return response()->json(['error' => 'File ZIP tidak ditemukan'], 404);
        }

        return response()->download(storage_path('app/public/sertifikat/' . $zipFileName));
    }
}
