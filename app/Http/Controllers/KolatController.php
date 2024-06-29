<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use App\Models\KelompokLatihan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KolatController extends Controller
{
    public function table_peserta() {
        $data = Dropdown::whereRaw('LENGTH(kode) = 2')->get();
        
        $userId = auth()->user()->id;
        
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $user = KelompokLatihan::find($kolatId);

        $peserta = Peserta::where('kolat_id', $kolatId)->get();

        $formB = $user->nama_form_B;
        $alamatB = $user->form_B;
        

        return view('kolat.table-pendaftaran', compact('data', 'peserta', 'formB', 'alamatB'));
    }

    public function tambah_peserta(Request $request) {
        // dd($request);
        $validator = Validator::make($request->all(), Peserta::$rules, Peserta::$messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        if ($request->file('form_A')) {
            $form_A = $request->file('form_A');
            //proses menyimpan data pdf ke folder public/storage/form_A
            $path = $form_A->store('public/form_A');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_A->hashName();
            //menyimpan alamat penyimpanan fila
            $urlA = asset('storage/form_A/' . $hashname);
        }
        if ($request->file('form_C')) {
            $form_C = $request->file('form_C');
            //proses menyimpan data pdf ke folder public/storage/form_A
            $path = $form_C->store('public/form_C');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_C->hashName();
            //menyimpan alamat penyimpanan fila
            $urlC = asset('storage/form_C/' . $hashname);
        }
        if ($request->file('form_D')) {
            $form_D = $request->file('form_D');
            //proses menyimpan data pdf ke folder public/storage/form_A
            $path = $form_D->store('public/form_D');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_D->hashName();
            //menyimpan alamat penyimpanan fila
            $urlD = asset('storage/form_D/' . $hashname);
        }

        //mengambil id user yang login
        $user = Auth()->user()->id;
        $userId = KelompokLatihan::where('user_id', $user)->first()->id_kolat;

        //membuat object baru
        $tambah = new Peserta;

        //conversi dari kode JENIS KELAMIN menjadi "kategori" di table dropdown
        $jk = DB::table('dropdown')
            ->select('kategori')
            ->where('kode', $request->jenis_kelamin)
            ->get();
        
        $kategori_usia = DB::table('dropdown')
            ->select('kategori')
            ->where('kode', $request->kategori_usia)
            ->get();
        
        //conversi dari kode kelas tanding menjadi kategori di dropdown
        if ($request->kelas_tanding == NULL){
            $tambah->kelas_tanding = '-';
        }
        //conversi dari kode KELAS TANDING menjadi "kategori" di table dropdown
        if (!empty($request->kelas_tanding)) {
            
            $kelas_tanding = DB::table('dropdown')
                ->select('kategori')
                ->where('kode', $request->kelas_tanding)
                ->get();
                $tambah->kelas_tanding = $kelas_tanding[0]->kategori;
        }

        //conversi dari kode kelas tanding menjadi kategori di dropdown
        $kategori_tanding = DB::table('dropdown')
            ->select('kategori')
            ->where('kode', $request->kategori_tanding  )
            ->get();
            
        //mengambil nama asli file
        $nama = $request->file('form_A');
        $namaA = $nama->getClientOriginalName();
        $nama = $request->file('form_C');
        $namaC = $nama->getClientOriginalName();
        $nama = $request->file('form_D');
        $namaD = $nama->getClientOriginalName();

        //insert data ke table KelompokLatihan
        $tambah->kolat_id = $userId;
        $tambah->nama_atlet = $request->nama_atlet;
        $tambah->tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $tambah->jenis_kelamin = $jk[0]->kategori;
        $tambah->sekolah = $request->sekolah;
        $tambah->kategori_tanding = $kategori_tanding[0]->kategori;
        $tambah->kategori_usia = $kategori_usia[0]->kategori;
        
        if ($request->kategori_tanding == '01' || $request->kategori_tanding == '02' || $request->kategori_usia == '00.03' || $request->kategori_usia == '00.04') {
            $tambah->tingkat_nafas = '-';
        }else {
            $tambah->tingkat_nafas = $request->tingkat_nafas;
        }
        $tambah->nama_form_A = $namaA;
        $tambah->nama_form_C = $namaC;
        $tambah->nama_form_D = $namaD;
        $tambah->form_A = $urlA;
        $tambah->form_C = $urlC;
        $tambah->form_D = $urlD;
        $tambah->status = 'Belum Terverifikasi';
        $tambah->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_peserta(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        //conversi dari kode JENIS KELAMIN menjadi kategori di table dropdown
        $jk = DB::table('dropdown')
            ->select('kategori')
            ->where('kode', $request->jenis_kelamin)
            ->get();
        
        $kategori_usia = DB::table('dropdown')
            ->select('kategori')
            ->where('kode', $request->kategori_usia)
            ->get();
        
        //conversi dari kose kelas tanding menjadi kategori di dropdown
        if ($request->kelas_tanding == NULL){
            $peserta->kelas_tanding = '-';
        }
        else if ($request->hasAny('kelas_tanding') || $request->kelas_tanding == !null) {
            $kelas_tanding = DB::table('dropdown')
                ->select('kategori')
                ->where('kode', $request->kelas_tanding)
                ->get();
                $peserta->kelas_tanding = $kelas_tanding[0]->kategori;
        }

        $kategori_tanding = DB::table('dropdown')
                ->select('kategori')
                ->where('kode', $request->kategori_tanding)
                ->get();


        if ($request->file('form_A')) {
            //mengambil alamat penyimpanan file sebelumnya
            $alamat = DB::table('Peserta')
            ->select('form_A')
            ->where('id_peserta', $id)
            ->get();
            //mengubah alamat depan dari storage ke PUBLIC
            $alamat = str_replace('/storage/', '/public/', $alamat[0]->form_A);
            //menghapus file pdf yang sebelumnya
            if (!empty($request->form_A)) {
                Storage::delete($alamat);
            }
            //mengambil semua elemen inputan file pdf ke variable $form_A
            $form_A = $request->file('form_A');
            //proses menyimpan data pdf ke folder public/storage/form_A
            $path = $form_A->store('public/form_A');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_A->hashName();
            //menyimpan alamat penyimpanan fila
            $urlA = asset('storage/form_A/' . $hashname);
            //menyimpan original name dari file pdf
            $peserta->form_A = $urlA;
            $peserta->nama_form_A = 'form_A' . '.' . $request->file('form_A')->getClientOriginalName();
        }

        if ($request->file('form_C')) {
            //mengambil alamat penyimpanan file sebelumnya
            $alamat = DB::table('Peserta')
            ->select('form_C')
            ->where('id_peserta', $id)
            ->get();
            //mengubah alamat depan dari storage ke PUBLIC
            $alamat = str_replace('/storage/', '/public/', $alamat[0]->form_C);
            //menghapus file pdf yang sebelumnya
            if (!empty($request->form_C)) {
                Storage::delete($alamat);
            }
            //mengambil semua elemen inputan file pdf ke variable $form_C
            $form_C = $request->file('form_C');
            //proses menyimpan data pdf ke folder public/storage/form_C
            $path = $form_C->store('public/form_C');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_C->hashName();
            //menyimpan alamat penyimpanan fila
            $urlC = asset('storage/form_C/' . $hashname);
            //menyimpan original name dari file pdf
            $peserta->form_C = $urlC;
            $peserta->nama_form_C = 'form_C' . '.' . $request->file('form_C')->getClientOriginalName();
        }

        if ($request->file('form_D')) {
            //mengambil alamat penyimpanan file sebelumnya
            $alamat = DB::table('Peserta')
            ->select('form_D')
            ->where('id_peserta', $id)
            ->get();
            //mengubah alamat depan dari storage ke PUBLIC
            $alamat = str_replace('/storage/', '/public/', $alamat[0]->form_D);
            //menghapus file pdf yang sebelumnya
            if (!empty($request->form_D)) {
                Storage::delete($alamat);
            }
            //mengambil semua elemen inputan file pdf ke variable $form_D
            $form_D = $request->file('form_D');
            //proses menyimpan data pdf ke folder public/storage/form_D
            $path = $form_D->store('public/form_D');
            //hasname untuk menyamarkan nama asli file
            $hashname = $form_D->hashName();
            //menyimpan alamat penyimpanan fila
            $urlD = asset('storage/form_D/' . $hashname);
            //menyimpan original name dari file pdf
            $peserta->form_D = $urlD;
            $peserta->nama_form_D = 'form_D' . '.' . $request->file('form_D')->getClientOriginalName();
        }

        $peserta->nama_atlet = $request->nama_atlet;
        $peserta->tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $peserta->jenis_kelamin = $jk[0]->kategori;
        $peserta->sekolah = $request->sekolah;
        $peserta->kategori_tanding = $kategori_tanding[0]->kategori;
        $peserta->kategori_usia = $kategori_usia[0]->kategori;
        if ($request->kategori_tanding == '01' || $request->kategori_tanding == '02') {
            $peserta->tingkat_nafas = '-';
        }else {
            $peserta->tingkat_nafas = $request->tingkat_nafas;
        }
        $peserta->save();

        return redirect()->back()->with('success', 'Data berhasil di perbarui');
        // dd('berhasil');
    }

    public function delete($id_kolat){
        $peserta = Peserta::findOrFail($id_kolat);
        $alamatA = $peserta->form_A;
        $alamatA = str_replace('/storage/', '/public/', $alamatA);
        if (!empty($peserta->form_A)) {
            Storage::delete($alamatA);
        }
        
        $alamatC = $peserta->form_C;
        $alamatC = str_replace('/storage/', '/public/', $alamatC);
        if (!empty($peserta->form_C)) {
            Storage::delete($alamatC);
        }
        
        $alamatD = $peserta->form_D;
        $alamatD = str_replace('/storage/', '/public/', $alamatD);
        if (!empty($peserta->form_D)) {
            Storage::delete($alamatD);
        }
        $peserta->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function tambah_formB(Request $request) {

        $rules = [
            'form_B' => 'required|mimes:pdf',
        ];
        $messages = [
            'form_B.required' => 'Form B tidak boleh kosong!',
            'form_B.mimes' => 'File harus berformat pdf!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        };

        $userId = auth()->user()->id;
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $kolat = KelompokLatihan::find($kolatId);

        if (!empty($kolat->form_B)){
            return redirect()->back()
                    ->withErrors(['Sudah ada' => 'Dokumen sudah diupload!'])
                    ->withInput();
        }

        if ($request->file('form_B')) {
            $form_B = $request->file('form_B');
            //proses menyimpan data pdf ke folder public/sotrage/form_B
            $path = $form_B->store('public/form_B');
            //hasname untuk menyamarkan nama asli file
            $hashName = $form_B->hashName();
            //menyimpan alamat penyimpanan file
            $urlB = asset('storage/form_B/' . $hashName);
            //menyimpan original name dari file pdf
            $kolat->form_B = $urlB;
            $kolat->nama_form_B = 'form_B' . '.' . $request->file('form_B')->getClientOriginalName();
        }

        $kolat->save();

        return redirect()->back()->with('success', 'Form B Berhasil ditambahkan');
    }
    public function update_formB(Request $request) {

        $userId = auth()->user()->id;
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $user = KelompokLatihan::find($kolatId);

        // dd($user->form_B);
        if ($request->file('form_B')) {
            //mengambil alamat penyimpanan file sebelumnya
            $alamat = $user->form_B;
            //mengubah alamat depan dari STORAGE ke PUBLIC
            $alamat = str_replace('/storage/', '/public/', $alamat);
            //menghapus file pdf yang sebelumnya
            if (!empty($request->form_B)) {
                Storage::delete($alamat);
            }
            $form_B = $request->file('form_B');
            //proses menyimpan data pdf ke folder public/sotrage/form_B
            $path = $form_B->store('public/form_B');
            //hasname untuk menyamarkan nama asli file
            $hashName = $form_B->hashName();
            //menyimpan alamat penyimpanan file
            $urlB = asset('storage/form_B/' . $hashName);
            //menyimpan original name dari file pdf
            $user->form_B = $urlB;
            $user->nama_form_B = 'form_B' . '.' . $request->file('form_B')->getClientOriginalName();
            $user->save();

            return redirect()->back()->with('success', 'Form B Berhasil diperbarui');
        }
    }

    public function delete_formB() {

        $userId = auth()->user()->id;
        $kolatId = KelompokLatihan::where('user_id', $userId)->first()->id_kolat;
        $user = KelompokLatihan::find($kolatId);

        //delete file
        $alamatB = $user->form_B;
        $alamatB = str_replace('/storage/', '/public/', $alamatB);
        Storage::delete($alamatB);

        //delete alamat dan nama
        $user->form_B = NULL;
        $user->nama_form_B = NULL;
        $user->save();

        return redirect()->back()->with('success', 'Form B Berhasil dihapus');
    }
}
