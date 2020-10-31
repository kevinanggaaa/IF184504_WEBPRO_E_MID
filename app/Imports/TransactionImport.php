<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\User;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::where('name', $row['costumer_name'])->first();
        $row['user_id'] = $user->id;

        $book = Book::where('title', $row['book_title'])->first();
        $row['book_id'] = $book->id;

        return new Transaction([
            'book_id' => $row['book_id'],
            'user_id' => $row['user_id'],
            'date_issued' => $row['date_issued'],
            'date_due_for_return' => $row['date_due_for_return'],
            'date_return' => $row['date_return'],
        ]);
    }
}
