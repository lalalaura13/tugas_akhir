<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBagan extends Model
{
    use HasFactory;
    protected $table = 'detail_bagan';
    protected $guarded = [] ;

    public function bagan()
    {
        return $this->belongsTo(Bagan::class,'bagan_id','id');
    }
}