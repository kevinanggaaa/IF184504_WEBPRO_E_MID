<?php

namespace App\Exports;

use App\Models\BookCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class bookCategoryExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BookCategory::all();
    }
}
