<?php

namespace App\Exports;

use App\Models\IbuHamil;
use Maatwebsite\Excel\Concerns\FromCollection;

class IbuHamilExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IbuHamil::all();
    }
}
