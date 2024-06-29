<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getkelamin(Request $request) {
        $idUsia = $request->idUsia;
        $kelamin = Dropdown::where('kode', 'like', $idUsia . '%')
                    ->whereRaw('LENGTH(kode) = 8')
                    ->get();
        
        echo "<option value=''>-- Pilih Jenis Kelamin --</option>";
        foreach ($kelamin as $k) {
            echo "<option value='$k->kode'>$k->kategori</option>";
        }
    }

    public function gettanding(Request $request) {
        $idKelamin = $request->idKelamin;
        $tanding = Dropdown::where('kode', 'like', $idKelamin . '%')
                    ->whereRaw('LENGTH(kode) = 11')
                    ->get();
        
        echo "<option value=''>-- Pilih Kelas Tanding --</option>";
        foreach ($tanding as $t) {
            echo "<option value='$t->kode'>$t->kategori</option>";
        }
    }

    public function getusia(Request $request) {
        $idKategoritanding = $request->idKategoritanding;
        $kategoriTanding = Dropdown::where('kode', 'like' , $idKategoritanding . '%')
                        ->whereRaw('LENGTH(kode) = 5')
                        ->get();

        echo "<option value=''>-- Pilih Kategori Usia --</option>";
        foreach ($kategoriTanding as $k) {
            echo "<option value='$k->kode'>$k->kategori</option>";
        }
    }
    
}
