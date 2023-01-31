<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 0:48
 */

namespace App\Repositories\Book;

interface BookRepositoryContract
{
    public function create($data);

    public function search($value);

    public function FindById($id);

    public function update($data , $id);

    public function UserBooks($paginate = 10);

    public function SoftDelete($book_id);

    public function booksByOrderIdDesc($limit = 10);
}