<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Produits;
use App\Models\Sliders;
use App\Models\commandes;

class adminController extends Controller
{
    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function ajouterCategories(){
        return view ('admin.ajouterCategories');
    }
    public function afficherCategories(){
        $categories=categories::get();
        return view ('admin.afficherCategories',compact('categories'));
    }
    public function ajouterProduit(){
       $categories=categories::All()->pluck('nomcategorie','nomcategorie');
        return view ('admin.ajouterproduit',compact('categories'));
    }
    public function afficherProduit(){
        $produit=Produits::get();
        return view ('admin.afficherProduit',compact('produit'));
    }
    
    public function afficherSliders(){
        $sliders=Sliders::get();
        return view ('admin.afficherSliders',compact('sliders'));
    }
    public function ajouterSliders(){
        return view ('admin.ajoutersliders');
    }
    public function commandes(){
       $commande=commandes::get();

       
       
        return view ('admin.commandes',compact('commande'));
    }
    public function login(){
        return view ('admin.login');
    }
    public function signup(){
        return view ('admin.signup');
    }
    public function activerproduit($id){
        $produit=Produits::find($id);
        $produit->statut=1;
        $produit->update();
        return redirect()->route('produits.index');
    }

    public function desactiverproduit($id){
        $produit=Produits::find($id);
        $produit->statut=0;
        $produit->update();
        return redirect()->route('produits.index');
    }
    public function activerslider($id){
        $slider=sliders::find($id);
        $slider->statut=1;
        $slider->update();
        return redirect()->route('sliders.index');
    }
    public function desactiverslider($id){
        $slider=sliders::find($id);
        $slider->statut=0;
        $slider->update();
        return redirect()->route('sliders.index');
    }
    // public function creerCompte(Request $request){
    //      $request->validate([
    //         'email'=>'required',
    //         'password'=>'required',
    //         'image'=>'required|mimes:png,jpg,jpeg'
    //      ]);
    //      $input=$request->all();
    //     if($image=$request->file('image')){
    //         $destination='images/';
    //         $nomImage=date('YmdHis').".".$image->getClientOrignalName();
    //         $image=move($destination,$nomImage);
    //         $input['image']="$nomImage";

    //     }
    //      client::create($input);
    //     return view()
    // }
    
    
       
}
