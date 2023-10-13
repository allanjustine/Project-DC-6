<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client')->paginate(10);
        return Inertia::render('Cashier/Sale', [
            'sales'         =>          $sales
        ]);
    }
}
