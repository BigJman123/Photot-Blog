<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Nacho\Billing\BillingInterface;

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
        return view('stripe.buy');
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

        // Create an order record
        // Order::create(['price' => Cart::getSubttotal(), 'items' => Cart::getItems()])

        try
        {
            $customerId = $billing->charge([
                'email' => $request->get('email'),
                'token' => $request->get('stripe-token')
            ]);

            $user = User::first();
            $user->billing_id = $customerId;
            $user->save();
        }

        catch(Exception $e)
        {
            return Redirect::refresh()->withFlashMessage($e->getMessage());
        }

        // return to order.show page with the id of the new order you created
        // return redirect()->route('order.show', $order->id);

        return "order was successful";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
