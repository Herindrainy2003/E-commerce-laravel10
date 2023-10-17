<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Produits;
use App\Models\cart;
use App\Models\categories;
use Illuminate\Support\Facades\Redirect;
use Session;




class clientController extends Controller
{
    public function home(){
        $sliders=Sliders::where('statut',1)->get();
        $produit=Produits::where('statut',1)->get();
        return view('frontend.index',compact('sliders','produit'));
    }
    public function shop(){
        $sliders=Sliders::where('statut',1)->get();
        $produit=Produits::where('statut',1)->get();
        $categories=categories::get();
        return view('frontend.shop',compact('produit','categories','sliders'));
    }
    public function cart(){
       

        $produit = Produits::all();
        return view('frontend.cart',compact('produit'));

    }
    // public function cart(){
    //     if(!Session::has('cart')){
    //         return view('client.cart');
    //     }

    //     $oldCart = Session::has('cart')? Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     return view('frontend.cart', ['products' => $cart->items]);
    // }
    public function checkout(){
       $sliders=Sliders::where('statut',1)->get();
        $cart= (Session::get('cart'));
        return view('frontend.checkout',compact('cart','sliders'));
    }
    public function affichage(){
        return view('admin.affichage');
    }
    public function selectionParCategories($nomcategorie){
        $sliders=Sliders::where('statut',1)->get();
        $categories=categories::get();
        $produit=Produits::where('categories',$nomcategorie)->where('statut',1)->get();
      
        return view('frontend.shop',compact('produit','categories','sliders'));
    }
    // public function ajouterCart($id)
    // {
    //     $produit=Produits::find($id);
    //     $oldCart = Session::has('cart')? Session::get('cart'):null;
    //     $cart = new cart($oldCart);
    //     $cart->add($produit, $id);
    //     Session::put('cart', $cart);

    //     //dd(Session::get('cart'));
    //     return redirect::to('/shop');
    // }
    // public function modifierCart(Request $request,$id)

    // { 
        
    //     $oldCart = Session::has('cart')? Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $cart->updateQty($id, $request->quantity);
    //     Session::put('cart', $cart);

    //     //dd(Session::get('cart'));
    //     return redirect::to('/panier');

    // }
    // public function remove(Request $request)

    // {

    //     if($request->id) {

    //         $cart = session()->get('cart');

    //         if(isset($cart[$request->id])) {

    //             unset($cart[$request->id]);

    //             session()->put('cart', $cart);

    //         }

    //         session()->flash('success', 'Product removed successfully');

    //     }

   // }
    
//    public function addProducttoCart($id)
//     {
//         $product = Product::findOrFail($id);
//         $cart = session()->get('cart', []);
//         if(isset($cart[$id])) {
//             $cart[$id]['quantity']++;
//         } else {
//             $cart[$id] = [
//                 "name" => $product->name,
//                 "quantity" => 1,
//                 "price" => $product->price,
//                 "description" => $product->description
//             ];
//         }
//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', 'Product has been added to cart!');
//     }
    
//     public function updateCart(Request $request)
//     {
//         if($request->id && $request->quantity){
//             $cart = session()->get('cart');
//             $cart[$request->id]["quantity"] = $request->quantity;
//             session()->put('cart', $cart);
//             session()->flash('success', 'Product added to cart.');
//         }
//     }
  
//     public function deleteProduct(Request $request)
//     {
//         if($request->id) {
//             $cart = session()->get('cart');
//             if(isset($cart[$request->id])) {
//                 unset($cart[$request->id]);
//                 session()->put('cart', $cart);
//             }
//             session()->flash('success', 'Product successfully deleted.');
//         }
//     }
public function ajouterCart($id)

{

    $produit = Produits::findOrFail($id);
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {

        $cart[$id] = [

            "name" => $produit->nomProduit,

            "quantity" => 1,

            "prix" => $produit->prixProduit,

            "image" => $produit->image

        ];
    }
    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}

public function update(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }
    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }
   
}
