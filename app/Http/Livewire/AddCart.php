<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddCart extends Component
{
    public Product $product ;

    public function add(){

        // Vérification de l'existence du produit dans le panier
        
        $cart = Cart::where('user_id', Auth::user()->id)
                   -> where('product_id', $this->product->id)
                   -> first();

        if (isset($cart)) {
            # code...
        }else{
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $this->product->id,
                'quantite' => 1,
                'prix' => $this->product->prix,
            ]);
        }

    }

    public function render()
    {

        return view('livewire.add-cart');
    }
}
