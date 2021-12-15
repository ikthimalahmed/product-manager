<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProducts extends Model
{
    protected $table = 'purchase_products';
    protected $fillable = ['name', 'address'];
}
