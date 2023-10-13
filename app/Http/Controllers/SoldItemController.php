<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SoldItemController extends Controller
{
    public function index()
    {
        $soldItems = SoldItem::with(['product', 'sale'])->paginate(10);

        return Inertia::render('Cashier/SoldItem', [
            'soldItems' => $soldItems,
        ]);
    }
}
