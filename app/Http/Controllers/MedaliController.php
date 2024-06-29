<?php

namespace App\Http\Controllers;

use App\Models\KelompokLatihan;
use App\Models\Medali;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedaliController extends Controller
{
    public function index()
    {
        $medali = Medali::all();
        $kolat = KelompokLatihan::whereHas('users', function($query) {
            $query->where('role_id', 2);
        })->get();
        // dd($kolat);

        return view('admin.olah-medali', compact('medali', 'kolat'));
    }

    public function tambah_medali(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), Medali::$rules, Medali::$messages);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $kolat = KelompokLatihan::findOrFail($request->id_kolat);
        // dd($kolat->nama_kontingen);

        $medali = new Medali();
        $medali->kolat_id = $kolat->id_kolat;
        // $medali->nama_kolat = $kolat->nama_kontingen;
        $medali->emas = $request->emas;
        $medali->perak = $request->perak;
        $medali->perunggu = $request->perunggu;
        $medali->save();

        return redirect()->back()->with('success', 'Medali berhasil ditambahkan');
    }

    public function update_medali(Request $request, $id)
    {
        $rules = [
            'nama_kolat' => 'required',
            'emas' => 'required',
            'perak' => 'required',
            'perunggu' => 'required',
        ];
    
        $messages = [
            'nama_kolat.required' => 'Nama Kolat tidak boleh kosong!',
            'emas.required' => 'Emas tidak boleh kosong!',
            'perak.required' => 'Perak tidak boleh kosong!',
            'perunggu.required' => 'Perunggu tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $medali = Medali::findOrFail($id);
        $medali->nama_kolat = $request->nama_kolat;
        $medali->emas = $request->emas;
        $medali->perak = $request->perak;
        $medali->perunggu = $request->perunggu;
        $medali->save();

        return redirect()->back()->with('success', 'Medali berhasil diperbarui');
    }

    public function delete_medali($id)
    {
        $medali = Medali::findOrFail($id);
        $medali->delete();

        return redirect()->back()->with('success', 'Medali berhasil dihapus');
    }
}
