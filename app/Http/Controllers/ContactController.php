<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list(){
        return view('contact.list', [
            'contacts' => Contact::all()
        ]);
    }

    public function create(){
        return view('contact.create');
    }

    public function show(Contact $contact){
        return view('contact.show', [
            'contact' => $contact
        ]);
    }

    public function store(Request $request){
        $request->validate([
            "full_name" => "required|string",
            "email" => "required|string",
            "message" => "required|string",
        ]);

        Contact::create([
            "full_name" => $request->input('full_name'),
            "email" => $request->input('email'),
            "message" => $request->input('message'),

        ]);

        return redirect('/')->with('message', "Le message a été envoyer avec succès.");
        
        
    }
}
