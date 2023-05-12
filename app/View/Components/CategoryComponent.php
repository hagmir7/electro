<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryComponent extends Component
{

    public $categories;

    public function __construct(){
        $this->categories = Category::paginate(30);
    }

    public function render(): View|Closure|string
    {
        return view('components.category-component', [
            "categories" => $this->categories
        ]);
    }

}
