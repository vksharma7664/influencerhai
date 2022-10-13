<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SampleInfulencerDetails implements ToModel#ToCollection
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    //      foreach ($collection as $row) 
    //     {
    //         print_r($row);
    //     }
    // }

    public function model(array $row)
    {
        foreach ($row as $row1) 
        {
            print_r($row1);
        }
    }
}
