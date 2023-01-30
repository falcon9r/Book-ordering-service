<?php

namespace App\Services\Book;

interface BookServiceContract
{
    public function canAction($book_id) : bool ;
}