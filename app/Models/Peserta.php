<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    protected $fillable = [
        'kolat_id',
        'nama_atlet',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'sekolah',
        'kategori_tanding',
        'kategori_usia',
        'kelas_tanding',
        'tingkat_nafas',
        'nama_form_A',
        'nama_form_C',
        'nama_form_D',
        'form_A',
        'form_C',
        'form_D',
        'status',
    ];

    public static $rules = [
        'nama_atlet' => 'required',
        'tempat_tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'sekolah' => 'required',
        'kategori_tanding' => 'required',
        'kategori_usia'=> 'required',
        // 'kelas_tanding'=> 'required',
        // 'tingkat_nafas'=> 'required',
        'form_A'=> 'required|mimes:pdf',
        'form_C'=> 'required|mimes:pdf',
        'form_D'=> 'required|mimes:pdf',
    ];

    public static $messages = [
        'nama_atlet.required' => 'Nama Atlet tidak boleh kosong',
        'tempat_tanggal_lahir.required' => 'TTL tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
        'sekolah.required' => 'Sekolah tidak boleh kosong',
        'kategori_tanding.required' => 'Kategori tanding tidak boleh kosong',
        'kategori_usia'=> 'Kategori Usia tidak boleh kosong',
        // 'kelas_tanding'=> 'Kelas tanding tidak boleh kosong',
        // 'tingkat_nafas'=> 'Tingkat nafas tidak boleh kosong',
        'form_A.required'=> 'Form A tidak boleh kosong',
        'form_C.required'=> 'Form C tidak boleh kosong',
        'form_D.required'=> 'Form D tidak boleh kosong',
        'form_A.mimes'=> 'Form A harus berformat pdf',
        'form_C.mimes'=> 'Form C harus berformat pdf',
        'form_D.mimes'=> 'Form D harus berformat pdf',
    ];

    public function kelompok_latihan(){
        return $this->belongsTo(KelompokLatihan::class, 'kolat_id', 'id');
    }
}
