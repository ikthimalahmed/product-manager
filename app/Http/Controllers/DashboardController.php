<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
   {
       if(Auth::user()->hasRole('user')){
            return view('user-dashboard');
       } elseif(Auth::user()->hasRole('admin')){
        return view('dashboard');
       }
    }

    public function profile()
   {
    return view('profile.update');
   }

   public function products()
   {
    return view('products.index');
   }

   public function cart()
   {
    return view('cart.index');
   }

   public function purchase()
   {
    return view('purchase.index');
   }
}
