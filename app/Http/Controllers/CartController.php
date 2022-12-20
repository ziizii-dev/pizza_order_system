<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $fillable=['cart_id','user_id','product_id','qty'];
}
