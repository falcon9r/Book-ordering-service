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
}