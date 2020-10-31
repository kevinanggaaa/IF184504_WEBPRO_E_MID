<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookcategory()
    {
        return $this->belongsTo('App\Models\BookCategory', 'category_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
