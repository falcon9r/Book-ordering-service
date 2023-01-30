<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryContract;
use App\Repositories\Category\CategoryRepositoryContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private  $categoryRepositoryContract;
    private  $bookRepositoryContract;
    public function __construct(CategoryRepositoryContract $categoryRepositoryContract , BookRepositoryContract $bookRepositoryContract)
    {
        $this->categoryRepositoryContract = $categoryRepositoryContract;
        $this->bookRepositoryContract = $bookRepositoryContract;
    }

    public function welcome()
    {
        return view('welcome', [
            'categories' => $this->categoryRepositoryContract->WelcomeCategoryWithBook(),
            'books' => $this->bookRepositoryContract->booksByOrderIdDesc()
        ]);
    }
}
