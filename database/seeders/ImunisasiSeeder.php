<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imunisasi;

class ImunisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $listImunisasi = [
            ['tgl_imunisasi' => '2021-04-26',         'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '15', 'bayi_id' => '1'],
            ['tgl_imunisasi' => '2021-04-26',         'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '14', 'bayi_id' => '2'],
            ['tgl_imunisasi' => '2021-04-26',      'umur_skr' => '4',  'ket' => 'Sehat', 'jenis_id' => '13', 'bayi_id' => '3'],
            ['tgl_imunisasi' => '2021-04-26',        'umur_skr' => '2',  'ket' => 'Sehat', 'jenis_id' => '12', 'bayi_id' => '4'],
            ['tgl_imunisasi' => '2021-04-26',    'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '11', 'bayi_id' => '5'],

            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '2',  'ket' => 'Sehat', 'jenis_id' => '5', 'bayi_id' => '6'],
            ['tgl_imunisasi' => '2021-04-26',        'umur_skr' => '1',  'ket' => 'Sehat', 'jenis_id' => '4', 'bayi_id' => '7'],
            ['tgl_imunisasi' => '2021-04-26',        'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '3', 'bayi_id' => '8'],
            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '1',  'ket' => 'Sehat', 'jenis_id' => '2', 'bayi_id' => '9'],
            ['tgl_imunisasi' => '2021-04-26',        'umur_skr' => '2',  'ket' => 'Sehat', 'jenis_id' => '1', 'bayi_id' => '10'],

            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '10', 'bayi_id' => '11'],
            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '4',  'ket' => 'Sehat', 'jenis_id' => '9', 'bayi_id' => '12'],
            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '8', 'bayi_id' => '13'],
            ['tgl_imunisasi' => '2021-04-26',       'umur_skr' => '2',  'ket' => 'Sehat', 'jenis_id' => '7', 'bayi_id' => '14'],
            ['tgl_imunisasi' => '2021-04-26', 'umur_skr' => '3',  'ket' => 'Sehat', 'jenis_id' => '6', 'bayi_id' => '15']
    
            ];
    
            foreach ($listImunisasi as $imunisasi) {
                Imunisasi::create($imunisasi);
            }
        }
    }
}
