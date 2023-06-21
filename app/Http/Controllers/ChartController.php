<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{



    public function chart($model)
    {
        $seven_days_ago = Carbon::now()->subDays(8)->format('Y-m-d');
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');



        $products = $model::whereBetween('created_at', [$seven_days_ago, $tomorrow])->get();
        // dd($products);
        // Create an associative array to store the view counts by day
        $product_counts_by_day = [];
        foreach ($products as $product) {
            $created_at_day = Carbon::parse($product->created_at)->format('Y-m-d');
            $product_counts_by_day[$created_at_day] = isset($product_counts_by_day[$created_at_day])
                ? $product_counts_by_day[$created_at_day] + 1
                : 1;
        }


    

        // Create a list of tuples that contains the date and the view count for each day
        $product_counts = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $product_count = isset($product_counts_by_day[$date]) ? $product_counts_by_day[$date] : 0;
            $product_counts[] = [$date, $product_count];
        }

        $product_counts = array_reverse($product_counts);


        return $product_counts;

    }
    public function viewsChart(Request $request){
        $context = [
           
            'orders' => $this->chart(Order::class),
            'products' => $this->chart(Product::class),
            'users' => $this->chart(User::class),
        ];

        return new JsonResponse($context);
    }


}
