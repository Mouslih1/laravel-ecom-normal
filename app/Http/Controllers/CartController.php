<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index(){
        return view('cart.index')->with([
            'items' => Cart::Content()
        ]);
    }

    public function addProductToCart(Request $request, Product $product){
        /*Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'qty' => $request->qty,
            'attributes' => array(),
            'associatedModel' => $product,
        ))->associate($product);
        //dd($cart);*/
        if(!Auth::check()){
            return redirect('/login');
        }
        Cart::add($product->id, $product->title, $request->qty, $product->price)->associate($product);
        return redirect()->route('cart.index')->with('success','Order a été ajouter avec succé !!');
    }

    public function updateProductToCart(Request $request, $rowId){
       /* Cart::update($product->id, array(
            'qty' => array(
                'relative' => false,
                'value' => $request->qty,
       )));*/
        Cart::update($rowId, $request->qty);
        return redirect()->route('cart.index')->with('success','Quantité a été mise a jour avec succé !!');
    }

    public function removeProductToCart(Request $request, $rowId){
        //$id = Cart::where('rowId',$rowId)->first();
        //$id = $_GET['id'];
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success','Order a été supprimer avec succé !!');


    }
}