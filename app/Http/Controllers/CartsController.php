<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cart::where('user_id', Auth::user()->id)->get();
        return view('carts.index')->with(['data' => $data]);

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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric|gte:1'
        ]);
        $input = $request->all();
        $cart = New Cart();
        $cart->product_id = $input['product_id'];
        $cart->user_id = $input['user_id'];
        $cart->qty = $input['qty'];
        if($cart->save())
            return redirect()->back()->with("successMsg", "Product Added to cart!");
        else
            return redirect()->back()->withErrors("Could not add product to cart.");

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
        $Cart = Cart::find($id);
        if($Cart)
        {
            $Cart->delete();
            return redirect()->back()->with("successMsg", "Product Deleted Successfully!");            
        }
        else
            return redirect()->back()->withErrors("Could not delete Cart.");
    }
}
