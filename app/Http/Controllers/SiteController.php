<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SoldItem;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function dashboard()
    {

        $userCount = User::count();
        $clientCount = Client::count();
        $categoryCount = Category::count();
        $productCount = Product::count();
        $saleCount = Sale::count();
        $soldItemCount = SoldItem::count();

        return Inertia::render('Dashboard', [
            'userCount'     =>      $userCount,
            'clientCount'     =>      $clientCount,
            'categoryCount'     =>      $categoryCount,
            'productCount'     =>      $productCount,
            'saleCount'     =>      $saleCount,
            'soldItemCount'     =>      $soldItemCount,
        ]);
    }
}
