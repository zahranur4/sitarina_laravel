<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PaymentController extends Controller
{
    public function show(Product $product)
    {
        return view('payment.index', compact('product'));
    }
}
