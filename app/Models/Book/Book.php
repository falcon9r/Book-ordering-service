<?php

namespace App\Models\Book;

use App\Models\Author\Author;
use App\Models\AuthorBook\AuthorBook;
use App\Models\Category\Category;
use App\Models\CategoryBook\CategoryBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory , SoftDeletes;

    const DIRECTORY = 'book-covers';

    protected  $fillable = [
        'id',
        'title',
        'book_cover',
        'code',
        'book_cover',
        'user_id',
        'price',
        'count_of_pages',
        'age_limit',
        'annotation',
        'publication'
    ];


    protected $casts = [
        'price' => 'double'
    ];

    protected $appends = [
        'path' ,
        'display_price',
        'display_age_limit',
    ];

    public function getPathAttribute(){
        return asset('storage/'.$this->book_cover);
    }

    public function getDisplayPriceAttribute(){
        return '$'.$this->price;
    }

    public function getDisplayAgeLimitAttribute(){
        return $this->age_limit.'+';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, CategoryBook::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, AuthorBook::class);
    }
}
