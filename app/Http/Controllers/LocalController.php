<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalController extends Controller
{
    public function switchLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }

        Session::push('lang', $locale);

        App::setLocale('fr');
        return redirect('/');
    }
}
