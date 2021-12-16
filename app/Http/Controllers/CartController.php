<?php

namespace App\Http\Controllers;

use App\Models\PurchaseProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('cart.cart-items', ['products'=>$products]);
    }

    public function search($query)
    {
        $results = Product::where('product_name', 'LIKE', '%'.$query.'%')
                            ->get();
        return response()->json($results, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create');
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
     * @param  \App\Models\PurchaseProducts  $purchaseProducts
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseProducts $purchaseProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseProducts  $purchaseProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseProducts $purchaseProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseProducts  $purchaseProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseProducts $purchaseProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseProducts  $purchaseProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseProducts $purchaseProducts)
    {
        //
    }
}
