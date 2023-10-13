<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return Inertia::render('Cashier/Index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return Inertia::render('Cashier/CreateProduct');
    }
}
