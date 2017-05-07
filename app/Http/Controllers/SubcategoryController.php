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
    
    public function index($id)
    {   
   // return dd(Category::findOrFail($id)->subcategories);
       return view('categories.subcategories.index', [
        'category'=>$id,
          'subcategories'=> Category::findOrFail($id)->subcategories
       ]);
    }

 
    public function create($id)
    {
        return view ('categories.subcategories.create',[
            'category'=>$id
        ]);
    }

    
    public function store(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'unique:subcategories|required|min:2|max:255'
        ]);
        
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $category=Category::findOrFail($id);
        $category->subcategories()->save($subcategory);
        
        return redirect('/categories/subcategories/'.$id);
    }

    public function save(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect('/categories/subcategories/'.$request->category);
    }

    public function edit($id)
    {
        return view('categories.subcategories.edit',[
            'subcategory'=> Subcategory::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

   
    public function destroy(Request $request, $id)
    {
       Subcategory::findOrFail($id)->delete();
        
        return redirect('/categories/subcategories/'.$request->category_id);
    }
}
