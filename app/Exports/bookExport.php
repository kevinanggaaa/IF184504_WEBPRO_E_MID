<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class bookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }
}
