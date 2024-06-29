<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat';
    protected $fillable = [
        'kolat_id',
        'atlet',
        'kategori',
        'juara',
        'path',
    ];

    public static $rules = [
        'nama_kolat' => 'unique:medali,nama_kolat',
    ];

    public static $messages = [
        'nama_kolat.unique' => 'Nama Kolat sudah ada!',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(KelompokLatihan::class, 'kolat_id', 'id');
    }
}
