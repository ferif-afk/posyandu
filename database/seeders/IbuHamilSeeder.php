<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IbuHamil;

class IbuHamilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listIbuHamil = [
            ['nama_bumil' => 'Siti Nur',         'tgl_lahir' => '1980-05-21',  'gol_darah' => 'O', 'pekerjaan' => 'Ibu Rumah Tangga',          'alamat' => 'Jl. Kolam renang', 'no_telp' => '082567542341', 'nama_suami' => 'Burhan', 'bayi_id' => '10'],
            ['nama_bumil' => 'Jumik',         'tgl_lahir' => '1993-02-10',  'gol_darah' => 'O', 'pekerjaan' => 'Ibu Rumah Tangga',    'alamat' => 'Jl. Loncat indah', 'no_telp' => '087373476547', 'nama_suami' => 'Samsul', 'bayi_id' => '9'],
            ['nama_bumil' => 'Rini',      'tgl_lahir' => '1976-10-12',  'gol_darah' => 'AB', 'pekerjaan' => 'Buruh',     'alamat' => 'Jl. Bulu tangkis', 'no_telp' => '086377322312', 'nama_suami' => 'Budi', 'bayi_id' => '8'],
            ['nama_bumil' => 'Anni',        'tgl_lahir' => '1989-07-25',  'gol_darah' => 'A', 'pekerjaan' => 'Dokter',     'alamat' => 'Jl. Lompat Indah', 'no_telp' => '0832763254321', 'nama_suami' => 'Rehan', 'bayi_id' => '7'],
            ['nama_bumil' => 'Sulis',    'tgl_lahir' => '1990-10-15',  'gol_darah' => 'A', 'pekerjaan' => 'Ibu Rumah Tangga',         'alamat' => 'Jl. ikan Piranha', 'no_telp' => '083213236754', 'nama_suami' => 'Amir', 'bayi_id' => '6'],

            ['nama_bumil' => 'Nunuk',       'tgl_lahir' => '1992-01-10',  'gol_darah' => 'A', 'pekerjaan' => 'Guru',     'alamat' => 'Jl. Ikan Gabus', 'no_telp' => '0828372723456', 'nama_suami' => 'Joko', 'bayi_id' => '15'],
            ['nama_bumil' => 'Suji',        'tgl_lahir' => '1993-10-20',  'gol_darah' => 'O', 'pekerjaan' => 'Wirausaha',          'alamat' => 'Jl. Ikann Tombro', 'no_telp' => '081237284567', 'nama_suami' => 'Ardi', 'bayi_id' => '14'],
            ['nama_bumil' => 'Lidia',        'tgl_lahir' => '1978-12-02',  'gol_darah' => 'O', 'pekerjaan' => 'Ibu Rumah Tangga',        'alamat' => 'Jl. Loncat indah', 'no_telp' => '083173275678', 'nama_suami' => 'Heka', 'bayi_id' => '13'],
            ['nama_bumil' => 'Bella',       'tgl_lahir' => '1988-12-12',  'gol_darah' => 'O', 'pekerjaan' => 'Pedagang',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '086767668909', 'nama_suami' => 'Tampan', 'bayi_id' => '12'],
            ['nama_bumil' => 'Puput',        'tgl_lahir' => '1998-05-10',  'gol_darah' => 'AB', 'pekerjaan' => 'Buruh',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '0823737371232', 'nama_suami' => 'Tri', 'bayi_id' => '11'],

            ['nama_bumil' => 'Kustinah',       'tgl_lahir' => '1985-06-22',  'gol_darah' => 'AB', 'pekerjaan' => 'Buruh',     'alamat' => 'Jl. Kolam renang', 'no_telp' => '081726341256', 'nama_suami' => 'Dewa', 'bayi_id' => '5'],
            ['nama_bumil' => 'Fitri',       'tgl_lahir' => '1991-01-01',  'gol_darah' => 'B', 'pekerjaan' => 'Ibu Rumah Tangga',        'alamat' => 'Jl. Kolam renang', 'no_telp' => '08652424122', 'nama_suami' => 'Sudar', 'bayi_id' => '4'],
            ['nama_bumil' => 'Ayu',       'tgl_lahir' => '1997-06-25',  'gol_darah' => 'B', 'pekerjaan' => 'Pedagang',     'alamat' => 'Jl. Ikan tombro', 'no_telp' => '081636353429', 'nama_suami' => 'Samusi', 'bayi_id' => '3'],
            ['nama_bumil' => 'Winda',       'tgl_lahir' => '1990-03-16',  'gol_darah' => 'B', 'pekerjaan' => 'Ibu Rumah Tangga',       'alamat' => 'Jl. Ikan Gabus', 'no_telp' => '082625242422', 'nama_suami' => 'Naufal', 'bayi_id' => '2'],
            ['nama_bumil' => 'Ling Shu', 'tgl_lahir' => '1995-10-03',  'gol_darah' => 'O', 'pekerjaan' => 'Buruh',          'alamat' => 'Jl. Tasikmadu', 'no_telp' => '081726366454', 'nama_suami' => 'Ibnu', 'bayi_id' => '1']

        ];

        foreach ($listIbuHamil as $ibu) {
            IbuHamil::create($ibu);
        }
    }
}
