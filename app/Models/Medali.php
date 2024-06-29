<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medali extends Model
{
    use HasFactory;

    protected $table = 'medali';
    protected $fillable = [
        'nama_kolat',
    ];

    public static $rules = [
        'nama_kolat' => 'unique:medali,nama_kolat',
    ];

    public static $messages = [
        'nama_kolat.unique' => 'Nama Kolat sudah ada!',
    ];

    public function kolat()
    {
        return $this->belongsTo(KelompokLatihan::class, 'kolat_id', 'id_kolat');
    }
}
