<?php

namespace Database\Seeders;

use App\Models\KelompokLatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KolatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KelompokLatihan::create([
            'user_id' => '2',
            'nama_kontingen' => 'laura',
            'nama_pelatih_1' => 'laura ayu',
            'nama_pelatih_2' => 'ayu laura',
        ]);
        KelompokLatihan::create([
            'user_id' => '3',
            'nama_kontingen' => 'SMA N 3 Purwokerto',
            'nama_pelatih_1' => 'Wahyuningrum',
            'nama_pelatih_2' => 'Tohar',
        ]);
    }
}
