<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 23:11
 */

namespace App\Repositories\Common;

interface AuthorsRepositoryContract
{
    public function authors();

    public function create($data);

    public function unSelectedAuthors($book_id);

    public function find($author_id);

    public function update($data , $author_id);

    public function delete($author_id);
}