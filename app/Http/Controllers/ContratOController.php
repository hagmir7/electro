<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ContratO;


class ContratOController extends Controller
{

    public function list(){
        return view('contrat-o.list', [
            'contrats' => ContratO::all()
        ]);
    }

    public function create(){
        return view('contrat-o.create', [
            'clients' => Client::all()
        ]);
    }

    public function show(ContratO $contrat_o){
        return view('contrat-o.show', [
            'contrat' => $contrat_o
        ]);
    }

    public function delete(ContratO $contrat_o){
        $contrat_o->delete();
        return redirect()->route('contrat.o.list')->with(['message' => 'La contrat a été supprimer avec succès.']);
    }

    public function store(Request $request){
        $request->validate([
            "ref" => "required|string",
            "tournee" => "required|integer",
            "tarif" => "required|string",
            "client" => "required|int",

        ]);

        ContratO::create([
            "ref" => $request->input('ref'),
            "tournee" => $request->input('tournee'),
            "tarif" => $request->input('tarif'),
            "client_id" => $request->input('client'),
        ]);
        return redirect()->route('contrat.o.list')->with('message', "Le contrat_o a été créée avec succès.");
    }
}
