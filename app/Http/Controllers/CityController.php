<?php

namespace App\Http\Controllers;
use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
         return view ('cities.index', ['cities' => City::orderBy('name')->paginate(20)]);
    }


    public function create()
    {
        return view ('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'unique:cities|required|min:2|max:255'
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->save();

        return redirect('/cities');
    }



    public function edit($id)
    {
        return view ('cities.edit', [
           'city' => City::findOrFail($id)
        ]);
    }


    public function save(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'unique:cities|required|min:3|max:255'
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->save();

        return redirect('/cities');
    }


    public function destroy($id)
    {
         City::findOrFail($id)->delete();
        return redirect('/cities');
    }
}
