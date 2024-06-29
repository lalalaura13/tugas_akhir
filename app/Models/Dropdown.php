<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dropdown extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        'id',
        'kategori',
    ];
    protected $keyType = 'string';
    protected $primarykey = 'kode';

    protected static function boot()
    {
        parent::boot();
            static::creating(function ($model){
                if (empty($model->{$model->getKeyName()})) {
                    $model->{$model->getKeyName()} = Str::uuid()->toString();
                }
            });
    }
}
