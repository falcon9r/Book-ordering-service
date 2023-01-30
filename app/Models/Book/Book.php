<?php

namespace App\Models\Book;

use App\Models\Category\Category;
use App\Models\CategoryBook\CategoryBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model){
           $model->user_id = Auth::id();
        });
    }

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
}
