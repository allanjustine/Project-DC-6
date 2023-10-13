<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sale;
use App\Models\SoldItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    //
    public function index()
    {
        $clients = Client::get();

        return inertia('Clients/Index', [
            'clients' => Client::paginate(10)->through(fn ($client) => [
                'id' => $client->id,
                'last_name' => $client->last_name,
                'first_name' => $client->first_name,
                'address' => $client->address,
                'credit_limit' => $client->credit_limit,
                'phone' => $client->phone,
            ])
        ]);
    }

    public function create()
    {
        return Inertia::render('Clients/CreateClient');
    }

    public function view($id)
    {
        $client = Client::findOrFail($id);
        $sales = Sale::where('client_id', $client->id)->with('soldItems')->with('client')->get();
        return Inertia::render('Clients/ViewClient', [
            'client' => $client,
            'sales' => $sales,
        ]);
    }
}
