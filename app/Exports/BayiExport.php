<?php

namespace App\Exports;

use App\Models\Bayi;
use Maatwebsite\Excel\Concerns\FromCollection;

class BayiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bayi::all();
    }
}
