<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(categories $categories)
    {
        $categories=categories::get();

        return view('admin.affichercategories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function create(): View
    {
       
        // return view('admin.ajoutercategories');
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
            'nomcategorie'=>'required|unique:categories|regex:/^[A-z]/'
        ]);
        $input=$request->all();
        categories::create($input);
       return redirect('/afficherCategories');
   
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
        $categories=categories::find($id);
       
        return view('admin.updatecategories',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $category): RedirectResponse
    {
        $request->validate([
            'nomcategorie'=>'required|regex:/^[A-z]/'
        ]);
        $input=$request->all();
        $category->update($input);
         return redirect()->route('categories.index');
 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category )
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
   
}
