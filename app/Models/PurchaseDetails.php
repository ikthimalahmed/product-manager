<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable =[
        'id','product_name','quantity',
    ];
}
