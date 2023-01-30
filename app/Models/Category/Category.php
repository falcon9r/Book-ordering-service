<?php

namespace App\Models\Category;

use App\Models\Book\Book;
use App\Models\CategoryBook\CategoryBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    const  WELCOMEBOOKLIMIT = 10;
    protected $fillable = [
        'name',
        'id',
        'description'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class , CategoryBook::class);
    }

    public function books_with_limit()
    {
        return $this->belongsToMany(Book::class , CategoryBook::class)->limit(self::WELCOMEBOOKLIMIT);
    }
}
