<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [
        'id',
        'judul',
        'tanggal',
        'waktu',
        'narahubung_1',
        'nohp_narhub_1',
        'narahubung_2',
        'nohp_narhub_2',
        'narahubung_3',
        'nohp_narhub_',
    ];
    
}
