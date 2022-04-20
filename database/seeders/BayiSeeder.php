<?php

namespace Database\Seeders;
use App\Models\Bayi;

use Illuminate\Database\Seeder;

class BayiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        $listBayi = [
            ['nama_bayi' => 'Brian',         'tgl_lahir' => '2017-05-21',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3,6 Kg',          'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],
            ['nama_bayi' => 'Brandon',         'tgl_lahir' => '2018-02-10',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3 Kg',    'panjang_lahir' => '51 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '3'],
            ['nama_bayi' => 'Ayusona',      'tgl_lahir' => '2018-10-12',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3 Kg',     'panjang_lahir' => '52 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],
            ['nama_bayi' => 'Citra',        'tgl_lahir' => '2020-07-25',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3,6 Kg',     'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '4'],
            ['nama_bayi' => 'Fita',    'tgl_lahir' => '2019-10-15',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3,6 Kg',         'panjang_lahir' => '53 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '5'],

            ['nama_bayi' => 'Ayunda',       'tgl_lahir' => '2021-01-10',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3 Kg',     'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],
            ['nama_bayi' => 'Sinju',        'tgl_lahir' => '2020-10-20',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '2,9 Kg',          'panjang_lahir' => '51 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],
            ['nama_bayi' => 'Eko',        'tgl_lahir' => '2019-12-02',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '2,9 Kg',        'panjang_lahir' => '53 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '3'],
            ['nama_bayi' => 'Tayo',       'tgl_lahir' => '2018-12-12',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3,6 Kg',     'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '1'],
            ['nama_bayi' => 'Budi',        'tgl_lahir' => '2018-05-10',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3,2 Kg',     'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],

            ['nama_bayi' => 'Edo',       'tgl_lahir' => '2019-06-22',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3 Kg',     'panjang_lahir' => '53 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2'],
            ['nama_bayi' => 'Panji',       'tgl_lahir' => '2021-01-01',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3,6 Kg',        'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '3'],
            ['nama_bayi' => 'Paijo',       'tgl_lahir' => '2017-06-25',  'jenis_kelamin' => 'Perempuan', 'berat_lahir' => '3,6 Kg',     'panjang_lahir' => '50 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '1'],
            ['nama_bayi' => 'Rama',       'tgl_lahir' => '2020-03-16',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '2,9 Kg',       'panjang_lahir' => '51 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '1'],
            ['nama_bayi' => 'Ahai', 'tgl_lahir' => '2019-10-03',  'jenis_kelamin' => 'Laki-laki', 'berat_lahir' => '3,2 Kg',          'panjang_lahir' => '52 Cm', 'lingkar_kepala' => '20 Cm', 'anak_ke' => '2']

        ];

        foreach ($listBayi as $Balita) {
            Bayi::create($Balita);
        }
    }
}
