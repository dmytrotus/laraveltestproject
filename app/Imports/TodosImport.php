<?php

namespace App\Imports;

use App\Todo;
//use Illuminate\Support\Facades\Hash; не знаю що це, взнати потім
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //для того щоб позначити heaiding

class TodosImport implements ToModel, WithHeadingRow
{


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        return new Todo([
        'id' => $row['id'],
        'name'     => $row['name'],
        'description'    => $row['description'], 
        'completed' => $row['completed'],
        ]);
    }
}
