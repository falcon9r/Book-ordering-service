<?php

namespace App\Services\Book;

interface BookServiceContract
{
    public function canAction($book_id) : bool;

    public function alreadyInBasket($book_id) : bool;
}