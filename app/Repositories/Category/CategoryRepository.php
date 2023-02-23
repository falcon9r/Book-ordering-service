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
        $categories = Category::query()->inRandomOrder()->with('books_with_limit')->limit($limit)->get();
        $keeperIds = [];
        foreach ($categories as $category)
        {
            $tempBooks = [];
            foreach ($category->books_with_limit as $book)
            {
                if(isset($keeperIds[$book->id]))
                    continue;
                $tempBooks[] = $book;
                $keeperIds[$book->id] = true;
            }
            $category['books'] = $tempBooks;
        }
        return $categories;
    }

    public function create($data)
    {
        return Category::query()->create($data);
    }

    public function find($category_id)
    {
        return Category::query()->findOrFail($category_id);
    }

    public function delete($category_id)
    {
        $category = $this->find($category_id);
        return $category->delete();
    }

    public function update($data, $category_id)
    {
        $category = $this->find($category_id);
        return $category->update($data);
    }
}