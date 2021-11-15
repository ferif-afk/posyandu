<?php

namespace Database\Seeders;
use App\Models\JenisImunisasi;

use Illuminate\Database\Seeder;

class JenisImunisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $listJenis = [
            ['nama_imunisasi' => 'campak',   'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',          'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',     'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',          'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',      'ket' => 'Imunisasi'],

            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',          'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',          'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',          'ket' => 'Imunisasi'],

            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',         'ket' => 'Imunisasi'],
            ['nama_imunisasi' => 'campak',   'ket' => 'Imunisasi']
    
            ];
    
            foreach ($listJenis as $jenis) {
                JenisImunisasi::create($jenis);
            }
        }
    }
}
