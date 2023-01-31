<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book\Book;
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
        $books = Book::query()->where('user_id' , Auth::id())->pluck('id');
        $requested = Order::query()->whereIn('book_id' , $books)->where('status_id' , OrderStatus::REQUESTED)->get();
        $accepted = Order::query()->whereIn('book_id' , $books)->where('status_id', OrderStatus::ACCEPTED)->get();
        $served = Order::query()->whereIn('book_id' , $books)->where('status_id' , OrderStatus::SERVED)->get();
        $cancelled = Order::query()->whereIn('book_id' , $books)->where('status_id' , OrderStatus::CANCELLED)->get();
        return view('user.orders.index',[
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
    public function store(Request $request)
    {
        //
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
    public function destroy($order_id)
    {
        $order = Order::query()->findOrFail($order_id);
        $order->update([
            'status_id' => OrderStatus::CANCELLED
        ]);
        session()->flash('success', 'Order cancelled');
        return redirect()->route('user.orders.index');
    }

    public function accept($order_id)
    {
        $order = Order::query()->findOrFail($order_id);
        $order->update([
            'status_id' => OrderStatus::ACCEPTED
        ]);
        session()->flash('success', 'Order accepted');
        return redirect()->route('user.orders.index');
    }
    public function served($order_id)
    {
        $order = Order::query()->findOrFail($order_id);
        $order->update([
            'status_id' => OrderStatus::SERVED
        ]);
        session()->flash('success', 'Order served');
        return redirect()->route('user.orders.index');
    }
}
