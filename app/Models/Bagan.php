<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagan extends Model
{
    use HasFactory;

    protected $table = 'bagan';
    protected $fillable = [
        'sudut_merah',
        'sudut_biru',
        'kategori',
    ];
}
