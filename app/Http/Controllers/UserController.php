<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);

        return Inertia::render('Admin/Index', [
            'users' => $users,
        ]);
    }

    public function cashier()
    {
        $cashiers = User::where('name', 'Cashier')->with('roles')->paginate(10);
        return Inertia::render('SuperVisor/Index', [
            'cashiers' => $cashiers,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/CreateUser');
    }

    public function createCashier()
    {
        return Inertia::render('SuperVisor/CreateCashier');
    }
}
