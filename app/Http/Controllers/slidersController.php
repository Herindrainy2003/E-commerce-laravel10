<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;

class slidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sliders $sliders)
    {
        $sliders=Sliders::get();
        return view('admin.affichersliders',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'premiereDescription'=>'required|regex:/^[a-z0-9]/',
            'deuxiemeDescription'=>'required|regex:/^[a-z0-9]/',
            'image'=>'required|mimes:png,jpeg,jpg'
        ]);
        $input=$request->All();
        if($image=$request->file('image')){
            $pathImage="images/";
            $nomImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($pathImage,$nomImage);
            $input['image']="$nomImage";
        }
        Sliders::create($input);
        return redirect()->route('sliders.index');
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
        $sliders=Sliders::find($id);
        return view('admin.updatesliders',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Sliders $slider)
    {
        $request->validate([
            'premiereDescription'=>'required|regex:/^[a-z0-9]/',
            'deuxiemeDescription'=>'required|regex:/^[a-z0-9]/',
            
        ]);
        $input=$request->All();
        if($image=$request->file('image')){
            $pathImage="images/";
            $nomImage=date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($pathImage,$nomImage);
            $input['image']="$nomImage";
        }else{
            unset($input['image']);
        }
        $slider->update($input);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index');
    }
}
