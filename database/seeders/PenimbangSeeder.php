<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penimbangan;

class PenimbangSeeder extends Seeder
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
            ['tgl_lahir' => '2017-05-21',         'hasil_timbang' => '20 Kg',  'tinggi_badan' => '54 Cm', 'status' => 'Sehat', 'bayi_id' => 1],
            ['tgl_lahir' => '2018-02-10',         'hasil_timbang' => '22 Kg',  'tinggi_badan' => '58 Cm', 'status' => 'Sehat', 'bayi_id' => 2],
            ['tgl_lahir' => '2018-10-12',      'hasil_timbang' => '21 Kg',  'tinggi_badan' => '49 Cm', 'status' => 'Sehat', 'bayi_id' => 3],
            ['tgl_lahir' => '2020-07-25',        'hasil_timbang' => '23 Kg',  'tinggi_badan' => '54 Cm', 'status' => 'Sehat', 'bayi_id' => 4],
            ['tgl_lahir' => '2019-10-15',    'hasil_timbang' => '20 Kg',  'tinggi_badan' => '49 Cm', 'status' => 'Sehat', 'bayi_id' => 5],

            ['tgl_lahir' => '2021-01-10',       'hasil_timbang' => '20 Kg',  'tinggi_badan' => '53 Cm', 'status' => 'Sehat', 'bayi_id' => 6],
            ['tgl_lahir' => '2020-10-20',        'hasil_timbang' => '25 Kg',  'tinggi_badan' => '54 Cm', 'status' => 'Sehat', 'bayi_id' => 7],
            ['tgl_lahir' => '2019-12-02',        'hasil_timbang' => '22 Kg',  'tinggi_badan' => '50 Cm', 'status' => 'Sehat', 'bayi_id' => 8],
            ['tgl_lahir' => '2018-12-12',       'hasil_timbang' => '20 Kg',  'tinggi_badan' => '50 Cm', 'status' => 'Sehat', 'bayi_id' => 9],
            ['tgl_lahir' => '2018-05-10',        'hasil_timbang' => '19 Kg',  'tinggi_badan' => '53 Cm', 'status' => 'Sehat', 'bayi_id' => 10],

            ['tgl_lahir' => '2019-06-22',       'hasil_timbang' => '26 Kg',  'tinggi_badan' => '53 Cm', 'status' => 'Sehat', 'bayi_id' => 11],
            ['tgl_lahir' => '2021-01-01',       'hasil_timbang' => '25 Kg',  'tinggi_badan' => '54 Cm', 'status' => 'Sehat', 'bayi_id' => 12],
            ['tgl_lahir' => '2017-06-25',       'hasil_timbang' => '29 Kg',  'tinggi_badan' => '47 Cm', 'status' => 'Sehat', 'bayi_id' => 13],
            ['tgl_lahir' => '2020-03-16',       'hasil_timbang' => '25 Kg',  'tinggi_badan' => '47 Cm', 'status' => 'Sehat', 'bayi_id' => 14],
            ['tgl_lahir' => '2019-10-03',       'hasil_timbang' => '20 Kg',  'tinggi_badan' => '58 Cm', 'status' => 'Sehat', 'bayi_id' => 15]
    
            ];
    
            foreach ($listImunisasi as $imunisasi) {
                Penimbangan::create($imunisasi);
            }
        }
    }
}
