<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\BookCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $category = BookCategory::where('name', $row['book_category'])->first();
        $row['category_id'] = $category->id;

        return new Book([
            'title' => $row['title'],
            'description' => $row['description'],
            'publish_year' => $row['publish_year'],
            'author' => $row['author'],
            'publisher' => $row['publisher'],
            'category_id' => $row['category_id'],
        ]);
    }
}
