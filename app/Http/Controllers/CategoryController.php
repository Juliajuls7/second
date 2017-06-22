<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view ('categories.index', [
            'categories' => Category::with('subcategories')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('categories.create');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'unique:categories|required|min:2|max:255'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/categories');
    }



    public function edit($id)
    {
        return view ('categories.edit', [
           'category' => Category::findOrFail($id)
        ]);
    }

    public function save(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'unique:categories|required|min:3|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect('/categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/categories');
    }
}
