<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 23:13
 */

namespace App\Repositories\Common;


use App\Models\Author\Author;
use App\Repositories\Book\BookRepositoryContract;

class AuthorsRepository implements AuthorsRepositoryContract
{
    private  $bookRepositoryContract;

    public function __construct(BookRepositoryContract $bookRepositoryContract)
    {
        $this->bookRepositoryContract = $bookRepositoryContract;
    }

    public function authors()
    {
        return Author::query()->get();
    }

    public function create($data)
    {
        return Author::query()->create($data);
    }

    public function delete($author_id)
    {
        $author = $this->find($author_id);
        return $author->delete();
    }

    public function find($author_id)
    {
        return Author::query()->findOrFail($author_id);
    }

    public function update($data , $author_id)
    {
        $author = $this->find($author_id);
        return  $author->update($data);
    }

    public function unSelectedAuthors($book_id)
    {
        $authors = $this->bookRepositoryContract->FindById($book_id)->authors->pluck('id');
        return Author::query()->whereNotIn('id' , $authors)->get();
    }
}