<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Categories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $categories = Category::all(); // Fetch the category list from the database, adjust the query as per your database structure

        view()->share('categories', $categories);
        return $next($request);
    }
}
