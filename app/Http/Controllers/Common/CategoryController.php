<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\Category\StoreRequest;
use App\Repositories\Category\CategoryRepositoryContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepositoryContract;

    public function __construct(CategoryRepositoryContract $categoryRepositoryContract)
    {
        $this->categoryRepositoryContract = $categoryRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('common.categories.index' , [
            'categories' => $this->categoryRepositoryContract->categories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('common.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->categoryRepositoryContract->create($request->validated());
        session()->flash('success' , 'Category added');
        return redirect()->route('common.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepositoryContract->delete($id);
        session()->flash('success' , 'Category deleted');
        return redirect()->route('common.categories.index');
    }
}
