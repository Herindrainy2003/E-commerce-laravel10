<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\categories;

class produitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produits $produit)
    {
      $produit=Produits::get();
      return view('admin.afficherproduit',compact('produit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomProduit'=>'required|regex:/^[a-zA-Z0-9]/',
            'prixProduit'=>'required|regex:/^[0-9]/',
            'categories'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,ico'
        ]);
        $input=$request->all();
       
        if($image=$request->file('image')){
            $destination="images/";
            $nomImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destination,$nomImage);
            $input['image']="$nomImage";
        }
        Produits::create($input);
        return redirect('/afficherProduit');
      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=categories::All()->pluck('nomcategorie','nomcategorie');
        $produits=Produits::find($id);
        return view('admin.updateproduit',compact('categories','produits'));
                                        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produits $produit)
    {
        $request->validate([
            'nomProduit'=>'required|regex:/^[a-zA-Z)-9]/',
            'prixProduit'=>'required|regex:/^[0-9]/',
            'categories'=>'required',
            
        ]);
        $input=$request->all();
        //pour l'image
      if($image=$request->file('image')) {
        $destination='images/';
        $nomImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
        $image->move($destination,$nomImage);
        $input['image']="$nomImage";
         }else{
            unset($input['image']);
        }
        $produit->update($input);
         return redirect()->route('produits.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produits $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
}
