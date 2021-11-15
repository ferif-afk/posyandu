<?php

namespace App\Exports;

use App\Models\Penimbangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenimbanganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penimbangan::all();
    }
}
