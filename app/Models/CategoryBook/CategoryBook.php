<?php

namespace App\Models\CategoryBook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'book_id',
        'id'
    ];
}
