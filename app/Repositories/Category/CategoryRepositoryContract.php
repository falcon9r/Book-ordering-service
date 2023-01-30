<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 14:33
 */

namespace App\Repositories\Category;

interface CategoryRepositoryContract
{
    public function categories();

    public function UnselectedСategories($book_id);

    public function WelcomeCategoryWithBook($limit = 5);

    public function find($category_id);

    public  function delete($category_id);

    public function create($data);

    public function update($data, $category_id);
}