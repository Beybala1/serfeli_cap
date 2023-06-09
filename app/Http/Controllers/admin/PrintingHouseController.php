<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Http\Controllers\Controller;

class PrintingHouseController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->where('title', 'Mətbəə');
            })
            ->latest()
            ->paginate(6);
        return view('frontend.printing-house',get_defined_vars());
    }
}
