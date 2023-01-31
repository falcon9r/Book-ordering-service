<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 0:48
 */

namespace App\Repositories\Book;


use App\Models\AuthorBook\AuthorBook;
use App\Models\Book\Book;
use App\Models\CategoryBook\CategoryBook;
use Illuminate\Support\Facades\Auth;

class BookRepository implements BookRepositoryContract
{

    public function search($value)
    {
        return Book::query()->where('title' , 'like' , "%{$value}%")->orWhere('code' , 'like' , "%{$value}%")->get();
    }

    public function create($data)
    {
        $data['user_id'] = Auth::id();
        $book = Book::query()->create($data);
        if(isset($data['categories']))
        {
            $this->addingCategories($data['categories'] , $book->id);
        }
        if(isset($data['authors']))
        {
            $this->addingAuthors($data['authors'] , $book->id);
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
        AuthorBook::query()->where('book_id' , $id)->forceDelete();
        if(isset($data['categories']))
        {
            $this->addingCategories($data['categories'] , $id);
        }
        if(isset($data['authors']))
        {
            $this->addingAuthors($data['authors'] , $book->id);
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

    private function addingAuthors($authors, $book_id)
    {
        foreach($authors as $author_id)
        {
            AuthorBook::query()->create([
                'author_id' => $author_id,
                'book_id' => $book_id
            ]);
        }
    }
    public function SoftDelete($book_id)
    {
        $book = $this->FindById($book_id);
        $book->delete();
    }

    public function booksByOrderIdDesc($limit = 10)
    {
        return Book::query()->orderByDesc('id')->limit($limit)->get();
    }
}