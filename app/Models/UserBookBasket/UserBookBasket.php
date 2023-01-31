<?php

namespace App\Models\UserBookBasket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookBasket extends Model
{
    use HasFactory;

    protected  $fillable = [
        'id',
        'user_id',
        'book_id'
    ];
}
