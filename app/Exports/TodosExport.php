<?php

namespace App\Exports;

use App\Todo;
use Maatwebsite\Excel\Concerns\FromCollection;

class TodosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Todo::all();
    }
}
