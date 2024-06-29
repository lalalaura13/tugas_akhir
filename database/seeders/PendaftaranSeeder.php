<?php

namespace Database\Seeders;

use App\Models\Pendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pendaftaran::create([
            'id' => '1',
            'user_id' => '1',
            'nama_kontingen' => 'admin',
        ]);
        Pendaftaran::create([
            'id' => '2',
            'user_id' => '2',
            'nama_kontingen' => 'laura',
        ]);
        Pendaftaran::create([
            'id' => '3',
            'user_id' => '3',
            'nama_kontingen' => 'SMA N 3 Purwokerto',
        ]);
    }
}
