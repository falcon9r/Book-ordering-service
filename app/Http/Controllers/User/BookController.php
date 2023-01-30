<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Book\EditRequest;
use App\Http\Requests\User\Book\StoreRequest;
use App\Http\Requests\User\Book\UpdateRequest;
use App\Http\Requests\User\Book\UploadRequest;
use App\Models\Book\Book;
use App\Repositories\Book\BookRepositoryContract;
use App\Repositories\Category\CategoryRepositoryContract;
use App\Repositories\Common\AuthorsRepositoryContract;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepositoryContract;
    private $categoryRepositoryContract;
    private $authorsRepositoryContract;

    public function __construct(BookRepositoryContract $bookRepositoryContract ,
                                CategoryRepositoryContract $categoryRepositoryContract ,
                                AuthorsRepositoryContract $authorsRepositoryContract)
    {
        $this->bookRepositoryContract = $bookRepositoryContract;
        $this->categoryRepositoryContract = $categoryRepositoryContract;
        $this->authorsRepositoryContract = $authorsRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.book.index', [
            'books' => $this->bookRepositoryContract->UserBooks()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.book.create' , [
            'categories' => $this->categoryRepositoryContract->categories(),
            'authors' => $this->authorsRepositoryContract->authors()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $path = $request->file('book_cover')->store(Book::DIRECTORY , ['disk' => 'public']);
        $data['book_cover'] = $path;
        $this->bookRepositoryContract->create($data);
        session()->flash('success' , "Book added");
        return redirect()->route('user.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.book.show', [
            'book' => $this->bookRepositoryContract->FindById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , EditRequest $request)
    {
        return view("user.book.edit",[
            'book' => $this->bookRepositoryContract->FindById($id),
            'categories' => $this->categoryRepositoryContract->UnselectedСategories($id),
            'authors' => $this->authorsRepositoryContract->unSelectedAuthors($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $this->bookRepositoryContract->update($data, $id);
        session()->flash('success' , 'Book`s data updated');
        return redirect()->route('user.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->bookRepositoryContract->SoftDelete($id);
    }

    public function upload(UploadRequest $request ,$id)
    {
        $book_cover = $request->file('book_cover')->store(Book::DIRECTORY , ['disk' => 'public']);
        $this->bookRepositoryContract->update(['book_cover' => $book_cover] , $id);
        session()->flash('success' , 'Book`s photo uploaded');
        return redirect()->route('user.books.index');
    }
}
