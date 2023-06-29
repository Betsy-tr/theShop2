<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($id = 0){
        // Lister tous les produits

        if ($id !== 0) {

            $products = Product::where('category_id', $id)
                            ->orderby('created_at','desc')
                            ->paginate(6);
        } else {
            $products = Product::orderby('created_at','desc')
                                 ->paginate(6);
        }
        
        return view('welcome', compact('products'));
    }

    public function detail(Product $product){

        
        
        return view('detail', compact('product'));
    }
}
