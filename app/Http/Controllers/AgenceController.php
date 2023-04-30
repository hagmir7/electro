<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    public function list(){
        return view('agence.list', [
            'agences' => Agence::all()
        ]);
    }

    public function adminList() {
        return view('agence.admin-list', [
            'agences' => Agence::all()
        ]);
    }

    public function create(){
        return view('agence.create');
    }

    public function show(Agence $agence){
        return view('agence.show', [
            'agence' => $agence
        ]);
    }

    public function delete(Agence $agence){
        $agence->delete();
        return redirect()->route('agence.list')->with(['message' => 'L agence a été supprimer avec succès.']);
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string",
            "chef" => "required|string",
            "phone" => "required|string",
            "location" => "required|string",
            'address' => 'required|string'
        ]);

        Agence::create([
            "name" => $request->input('name'),
            "chef" => $request->input('chef'),
            "phone" => $request->input('phone'),
            "location" => $request->input('location'),
            "address" => $request->input('address')
        ]);
        return redirect()->route('agence.list')->with('message', "L agence a été créée avec succès.");
    }
}
