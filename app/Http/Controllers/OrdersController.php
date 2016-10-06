<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Nacho\Billing\BillingInterface;
use Cart;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillingInterface $billing, Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email',
                'stripe-token' => 'required'
            ]);

        $items = collect(Cart::getContent()->toArray())->map(function ($product) {
                    extract($product);
                    return compact('id', 'name', 'price', 'quantity');
                })->toArray();

        $order = Order::create($request->only(['name', 'address', 'city', 'state', 'zip']));
        $order->price = Cart::getSubTotal();
        $order->items = $items;
        $order->user_id = auth()->id();
        $order->save();
        // $order = Order::create(['price' => Cart::getSubTotal(), 'items' => $items]);

        try
        {
            $customerId = $billing->charge([
                'email' => $request->get('email'),
                'token' => $request->get('stripe-token')
            ]);

            $user = User::firstOrFail();
            $user->billing_id = $customerId;
            $user->save();
        }

        catch(Exception $e)
        {
            return Redirect::refresh()->withFlashMessage($e->getMessage());
        }

        return redirect()->route('order.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::findOrFail($id);

        return view('order.show')->with(['order' => $order]);
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
