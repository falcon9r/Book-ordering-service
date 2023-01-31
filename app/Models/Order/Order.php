<?php

namespace App\Models\Order;

use App\Models\Book\Book;
use App\Models\User\User;
use App\Services\Helper\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'status_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            $model->status_id = OrderStatus::REQUESTED;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
