<?php

namespace App\Models\AuthorBook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    use HasFactory;

    protected  $fillable = [
        'id',
        'book_id',
        'author_id'
    ];
}
