<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(){
        return view('client.list', [
            'clients' => Client::all()
        ]);
    }

    public function create(){
        return view('client.create');
    }

    public function show(Client $client){
        return view('client.show', [
            'client' => $client
        ]);
    }

    public function delete(Client $client){
        $client->delete();
        return redirect()->route('client.list')->with(['message' => 'Le client a été supprimer avec succès.']);
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string",
            "phone" => "required|string",
            "cin" => "required|string",
            "ville" => "required|string",
            'address' => 'required|string'
        ]);

        Client::create([
            "name" => $request->input('name'),
            "phone" => $request->input('phone'),
            "cin" => $request->input('cin'),
            "ville" => $request->input('ville'),
            "address" => $request->input('address')
        ]);
        return redirect()->route('client.list')->with('message', "Le client a été créée avec succès.");
    }
}
