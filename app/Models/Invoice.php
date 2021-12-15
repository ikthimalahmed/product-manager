<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = ['purchse_id', 'product_id', 'quantity', 'unit_price', 'amount', 'discount'];
}
