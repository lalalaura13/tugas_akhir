<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'nama',
        'email',
        'password',
    ];

    public static $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'min:6',
    ];

    public static $messages = [
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid!',
        'email.unique' => 'Email sudah digunakan!',
        'password.min' => 'Password minimal 6 Karakter!',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function kelompok_latihan(){
        return $this->hasMany(KelompokLatihan::class, 'user_id', 'id');
    }

}
