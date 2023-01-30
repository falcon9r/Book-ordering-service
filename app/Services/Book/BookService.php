<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 13:11
 */

namespace App\Services\Book;


use App\Models\Book\Book;
use Illuminate\Support\Facades\Auth;

class BookService implements BookServiceContract
{
    public function canAction($book_id) : bool
    {
        try {
            $book = Book::query()->findOrFail($book_id);
            if($book->user_id == Auth::id())
            {
                return true;
            }
        }catch (\Exception $exception)
        {
            return false;
        }
    }
}