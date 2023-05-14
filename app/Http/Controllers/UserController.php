<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function list(){
        return view('user/list',[
            'users' => User::paginate(30)
        ]);
    }


    public function create(){
        return view('user.register');
    }


    public function store(Request $request){
        if($request->input('password') == $request->input('password_1')){

            $request->validate([
                "first_name" => 'required|string|max:100',
                "last_name" => 'required|string|max:100',
                "email" => 'required|string|max:100',
                "password" => 'required|string|max:100',
                'password_1' => 'required'
            ]); 


            User::create([
                "first_name" => $request->input('first_name'),
                "last_name" => $request->input('last_name'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->password),
                "token" => Str::random(40),
            ]);

            return redirect()->route('user.list')->with('message', 'Utilisateur créé avec succès');
        }else{
            
            throw ValidationException::withMessages(['password' => 'This value is incorrect']);
        }
    }


    public function login(){
        if(Auth::user()){
            return redirect('dashboard');
        }else{
            return view("user/login");
        }
    }


    public function loginStore(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => "les informations d'identification invalides"]);
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }



    public function delete(User $user){
        $user->delete();
        return redirect()->route('user.list')->with('message','Utilisateur est supprimer avec succès');
    }
}
