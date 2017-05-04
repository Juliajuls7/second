<?php

namespace App\Http\Controllers;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        return view ('subcategories.index', [
            'subcategories' => subcategories()
        ]);
    }

 
    public function create()
    {
        return view ('subcategories.create');
    }

    
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'unique:subcategories|required|min:2|max:255'
        ]);
        
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->save();
        
        return redirect('/categories');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
