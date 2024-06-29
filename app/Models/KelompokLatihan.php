<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokLatihan extends Model
{
    use HasFactory;

    protected $table = 'kelompok_latihan';
    protected $primaryKey = 'id_kolat';
    protected $fillable = [
        'id_kolat',
        'user_id',
        'nama_kontingen',
        'nama_pelatih_1',
        'nama_pelatih_2',
        'form_B',
        'nama_form_B',
        'hashname',
        'password',
    ];
    
    public function peserta(){
        return $this->hasMany(Peserta::class, 'kolat_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class, 'kolat_id', 'id_kolat');
    }
    public function medali()
    {
        return $this->hasMany(Medali::class, 'kolat_id', 'id_kolat');
    }
    
}
