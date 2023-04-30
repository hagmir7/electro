<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContratE;
use Illuminate\Http\Request;

class ContratEController extends Controller
{
    public function list(){
        return view('contrat-e.list', [
            'contrats' => ContratE::all()
        ]);
    }

    public function create(){
        return view('contrat-e.create', [
            'clients' => Client::all()
        ]);
    }

    public function show(ContratE $contart_e){
        return view('contrat-e.show', [
            'contrat' => $contart_e
        ]);
    }

    public function delete(ContratE $contart_e){
        $contart_e->delete();
        return redirect()->route('contrat.e.list')->with(['message' => 'La contrat a été supprimer avec succès.']);
    }

    public function store(Request $request){
        $request->validate([
            "ref" => "required|string",
            "tournee" => "required|integer",
            "tarif" => "required|string",
            "client" => "required|int",

        ]);

        ContratE::create([
            "ref" => $request->input('ref'),
            "tournee" => $request->input('tournee'),
            "tarif" => $request->input('tarif'),
            "client_id" => $request->input('client'),
        ]);
        
        return redirect()->route('contrat.e.list')->with('message', "La Contrat a été créée avec succès.");
    }
}
