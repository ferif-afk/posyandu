<?php

namespace App\Exports;

use App\Models\Imunisasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImunisasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Imunisasi::all();
    }
}
