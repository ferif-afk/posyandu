<?php

namespace App\Exports;

use App\Models\JenisImunisasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class JenisImunisasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JenisImunisasi::all();
    }
}
