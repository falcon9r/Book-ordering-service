<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 0:48
 */

namespace App\Repositories\Book;


use App\Models\Book\Book;
use App\Models\CategoryBook\CategoryBook;
use Illuminate\Support\Facades\Auth;

class BookRepository implements BookRepositoryContract
{
    public function create($data)
    {
        $book = Book::query()->create($data);
        if(isset($data['categories']))
        {
            $this->addingCategories($data['categories'] , $book->id);
        }
        return $book;
    }

    public function FindById($id)
    {
        return Book::query()->findOrFail($id);
    }

    public function update($data , $id)
    {
        $book = $this->FindById($id);
        CategoryBook::query()->where('book_id', $id)->forceDelete();
        if(isset($data['categories']))
        {
            $this->addingCategories($data['categories'] , $id);
        }
        return $book->update($data);
    }

    public function UserBooks($paginate = 10)
    {
        return Book::query()->where('user_id' , Auth::id())->paginate($paginate);
    }

    private function addingCategories($categories , $book_id){
        foreach($categories as $category_id)
        {
            CategoryBook::query()->create([
                'category_id' => $category_id,
                'book_id' => $book_id
            ]);
        }
    }
}