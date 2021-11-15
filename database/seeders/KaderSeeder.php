<?php

namespace Database\Seeders;
use App\Models\Kader;
use Illuminate\Database\Seeder;

class KaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $listKader = [
            ['nama_kader' => 'Jumik',         'jabatan' => 'Ketua Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1983-05-13',          'alamat' => 'Jl. Tasikmadu', 'no_telp' => '0891123456543'],
            ['nama_kader' => 'Midah',         'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1990-12-12',    'alamat' => 'Jl. Tasikmadu', 'no_telp' => '086245371234'],
            ['nama_kader' => 'Nunuk',      'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1984-03-24',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '081256743526'],
            ['nama_kader' => 'Kustini',        'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1986-04-26',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '0893123476453'],
            ['nama_kader' => 'Fita',    'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1988-07-12',         'alamat' => 'Jl. Tasikmadu', 'no_telp' => '08515473957'],

            ['nama_kader' => 'Rini',       'jabatan' => 'Ketua Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1989-02-15',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '087312346754'],
            ['nama_kader' => 'Sulis',        'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1989-08-10',          'alamat' => 'Jl. Tasikmadu', 'no_telp' => '08512148675'],
            ['nama_kader' => 'Midah',        'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1990-12-12',        'alamat' => 'Jl. Tasikmadu', 'no_telp' => '086245371234'],
            ['nama_kader' => 'Nunuk',       'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1984-03-24',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '081256743526'],
            ['nama_kader' => 'Nunuk',        'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1984-03-24',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '081256743526'],

            ['nama_kader' => 'Sulis',       'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1989-08-10',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '08512148675'],
            ['nama_kader' => 'Midah',       'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1990-12-12',        'alamat' => 'Jl. Tasikmadu', 'no_telp' => '086245371234'],
            ['nama_kader' => 'Dwi',       'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1987-10-15',     'alamat' => 'Jl. Tasikmadu', 'no_telp' => '089126573293'],
            ['nama_kader' => 'Dwi',       'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1987-10-15',       'alamat' => 'Jl. Tasikmadu', 'no_telp' => '089126573293'],
            ['nama_kader' => 'Anni', 'jabatan' => 'Kader',  'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1988-06-17',          'alamat' => 'Jl. Tasikmadu', 'no_telp' => '081424364537']
    
            ];
    
            foreach ($listKader as $kader) {
                Kader::create($kader);
            }
        }
    }
}
