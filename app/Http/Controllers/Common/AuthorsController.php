<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\Authors\StoreRequest;
use App\Http\Requests\Common\Authors\UpdateRequest;
use App\Repositories\Common\AuthorsRepositoryContract;

class AuthorsController extends Controller
{
    private  $authorsRepositoryContract;

    public function __construct(AuthorsRepositoryContract $authorsRepositoryContract)
    {
        $this->authorsRepositoryContract = $authorsRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('common.authors.index' , [
            'authors' => $this->authorsRepositoryContract->authors()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('common.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorsRepositoryContract->create($request->validated());
        session()->flash('success' , 'Author added');
        return redirect()->route('common.authors.index');
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
        return view('common.authors.edit' , [
            'author' => $this->authorsRepositoryContract->find($id)
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
        $this->authorsRepositoryContract->update($request->validated(), $id);
        session()->flash('success' , 'Author updated');
        return redirect()->route('common.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorsRepositoryContract->delete($id);
        session()->flash('success' , 'Author deleted');
        return redirect()->route('common.authors.index');
    }
}
