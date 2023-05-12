<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductComponent extends Component
{
    
    protected $products;
    public function __construct(){
        $this->products = Product::paginate(15);
    }


    public function render(): View|Closure|string
    {
        return view('components.product-component', [
            'products' => $this->products
        ]);
    }

}
