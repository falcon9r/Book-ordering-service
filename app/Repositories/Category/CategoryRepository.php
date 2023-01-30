<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 30.01.2023
 * Time: 14:33
 */

namespace App\Repositories\Category;

use App\Models\Category\Category;
use App\Models\CategoryBook\CategoryBook;

class CategoryRepository implements CategoryRepositoryContract
{
    public function categories()
    {
        return Category::query()->get();
    }

    public function UnselectedСategories($book_id){
        $selected_categories_ids = CategoryBook::query()->where('book_id', $book_id)->pluck('category_id');
        return Category::query()->whereNotIn('id' , $selected_categories_ids)->get();
    }

    public function WelcomeCategoryWithBook($limit = 5)
    {
        return Category::query()->inRandomOrder()->limit($limit)->get();
    }
}