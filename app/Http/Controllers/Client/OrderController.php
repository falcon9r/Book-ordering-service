<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Order\StoreRequest;
use App\Models\Order\Order;
use App\Services\Helper\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $requested = Order::query()->where('user_id' , $user_id)->where('status_id' , OrderStatus::REQUESTED)->get();
        $accepted = Order::query()->where('user_id' , $user_id)->where('status_id', OrderStatus::ACCEPTED)->get();
        $served = Order::query()->where('user_id' , $user_id)->where('status_id' , OrderStatus::SERVED)->get();
        $cancelled = Order::query()->where('user_id' , $user_id)->where('status_id' , OrderStatus::CANCELLED)->get();
        return view('client.book.index', [
            'requested' => $requested,
            'accepted' => $accepted,
            'served' => $served,
            'cancelled' => $cancelled
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Order::query()->create([
            'user_id' => Auth::id(),
            'book_id' => $data['book_id']
        ]);
        session()->flash('success' , 'Book requested');
        return redirect()->back();
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
        //
    }
}
