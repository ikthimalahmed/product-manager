<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\InvoiceDetails;
use App\Models\PurchaseDetails;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchase::paginate(5);
        $purchaseDetails = PurchaseDetails::paginate(5);
        $product= Product::orderby('product_name','asc')->get();
        return view('purchase.index',compact(['purchase','purchaseDetails','product']));
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
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'customer_name' => 'required',
        ]);

        $newPurchase = new Purchase;

        $newPurchase->customer_name=$request->input('customer_name');
        $newPurchase->save();

        $newPurchaseDetails = new PurchaseDetails;
        $newPurchaseDetails->product_name=$request->input('product_name');
        $newPurchaseDetails->quantity=$request->input('quantity');
        $newPurchaseDetails->save();

        return redirect('purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
