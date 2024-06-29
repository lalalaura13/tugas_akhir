<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DropdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sql = "
            INSERT INTO kategori (kode, kategori)
            VALUES
            ('0', 'Pilih Kategori Tanding'),
            ('00', 'Tanding'),
            
            ('00.01', 'Dewasa (mahasiswa/Umum)'),
            
            ('00.01.01', 'Putra'),
            
            ('00.01.01.01', 'Kelas A'),
            ('00.01.01.02', 'Kelas B'),
            ('00.01.01.03', 'Kelas C'),
            ('00.01.01.04', 'Kelas D'),
            ('00.01.01.05', 'Kelas E'),
            ('00.01.01.06', 'Kelas F'),
            ('00.01.01.07', 'Kelas G'),
            ('00.01.01.08', 'Kelas H'),
            ('00.01.01.09', 'Kelas I'),
            ('00.01.01.10', 'Kelas J'),
            ('00.01.02', 'Putri'),
            
            ('00.01.02.11', 'Kelas A'),
            ('00.01.02.12', 'Kelas B'),
            ('00.01.02.13', 'Kelas C'),
            ('00.01.02.14', 'Kelas D'),
            ('00.01.02.15', 'Kelas E'),
            ('00.01.02.16', 'Kelas F'),
            ('00.02', 'Remaja (SMA)'),
            
            ('00.02.03', 'Putra'),
            
            ('00.02.03.17', 'Kelas A'),
            ('00.02.03.18', 'Kelas B'),
            ('00.02.03.19', 'Kelas C'),
            ('00.02.03.20', 'Kelas D'),
            ('00.02.03.21', 'Kelas E'),
            ('00.02.03.22', 'Kelas F'),
            ('00.02.03.23', 'Kelas G'),
            ('00.02.03.24', 'Kelas H'),
            ('00.02.03.25', 'Kelas I'),
            ('00.02.03.26', 'Kelas J'),
            ('00.02.04', 'Putri'),
            
            ('00.02.04.27', 'Kelas A'),
            ('00.02.04.28', 'Kelas B'),
            ('00.02.04.29', 'Kelas C'),
            ('00.02.04.30', 'Kelas D'),
            ('00.02.04.31', 'Kelas E'),
            ('00.02.04.32', 'Kelas F'),
            ('00.02.04.33', 'Kelas G'),
            ('00.02.04.34', 'Kelas H'),
            ('00.03', 'Pra Remaja (SMP)'),
            
            ('00.03.05', 'Putra'),
            
            ('00.03.05.35', 'Kelas A'),
            ('00.03.05.36', 'Kelas B'),
            ('00.03.05.37', 'Kelas C'),
            ('00.03.05.38', 'Kelas D'),
            ('00.03.05.39', 'Kelas E'),
            ('00.03.05.40', 'Kelas F'),
            ('00.03.05.41', 'Kelas G'),
            ('00.03.05.42', 'Kelas H'),
            ('00.03.05.43', 'Kelas I'),
            ('00.03.05.44', 'Kelas J'),
            ('00.03.06', 'Putri'),
            
            ('00.03.06.45', 'Kelas A'),
            ('00.03.06.46', 'Kelas B'),
            ('00.03.06.47', 'Kelas C'),
            ('00.03.06.48', 'Kelas D'),
            ('00.03.06.49', 'Kelas E'),
            ('00.03.06.50', 'Kelas F'),
            ('00.03.06.51', 'Kelas G'),
            ('00.03.06.52', 'Kelas H'),
            ('00.04', 'Usia Dini (Kelas 3-6 SD)'),
            
            ('00.04.07', 'Putra'),
            
            ('00.04.07.53', 'Kelas A'),
            ('00.04.07.54', 'Kelas B'),
            ('00.04.07.55', 'Kelas C'),
            ('00.04.07.56', 'Kelas D'),
            ('00.04.07.57', 'Kelas E'),
            ('00.04.07.58', 'Kelas F'),
            ('00.04.07.59', 'Kelas G'),
            ('00.04.07.60', 'Kelas H'),
            ('00.04.07.61', 'Kelas I'),
            ('00.04.08', 'Putri'),
            
            ('00.04.08.62', 'Kelas A'),
            ('00.04.08.63', 'Kelas B'),
            ('00.04.08.64', 'Kelas C'),
            ('00.04.08.65', 'Kelas D'),
            ('00.04.08.66', 'Kelas E'),
            ('00.04.08.67', 'Kelas F'),
            ('00.04.08.68', 'Kelas G'),
            


            ('01', 'Seni Tunggal '),
            
            ('01.01', 'Dewasa (mahasiswa/Umum)'),
            
            ('01.01.01', 'Putra'),
            ('01.01.02', 'Putri'),
            ('01.02', 'Remaja (SMA)'),
            
            ('01.02.03', 'Putra'),
            ('01.02.04', 'Putri'),



            ('02', 'Getaran '),

            ('02.01', 'Dewasa (mahasiswa/Umum)'),
            
            ('02.01.01', 'Putra'),
            ('02.01.02', 'Putri'),
            ('02.02', 'Remaja (SMA)'),
            
            ('02.02.03', 'Putra'),
            ('02.02.04', 'Putri')
            
        ";
        DB::statement($sql);
    }
}