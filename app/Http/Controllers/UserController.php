<?php

namespace App\Http\Controllers;
use App\User;
use App\City;
use App\Education;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
          return view('users.index', ['users' => User::orderByDesc('created_at')->get()]);
    }


    public function create()
    {
  //      return view('users.create',['subcategories'=> Subcategory::all()]);
    }


    public function store(Request $request)
    {
    //     $question = new Question();
    //     $question->subcategory_id = $request->subcategory;
    //     $question->head = $request->head;
    //     $question->text = $request->text;
    //     $request->user()->questions()->save($question);

    //    return redirect('/questions');
    }


    public function show($id)
    {
      //return 1;
        return view ('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('users.edit',[
          'user'=>User::findOrFail($id),
          'city'=> City::all(),
          'education'=> Education::all()

        ]);
    }


    public function save(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->city_id = $request->city;
        $user->education_id = $request->education;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->DOB = $request->DOB;
        $user->phone = $request->phone;
        $user->skype = $request->skype;
        $user->activities = $request->activities;
        $user->skills = $request->skills;
        $user->about_myself = $request->about_myself;
        $user->photo = $request->photo;
        $user->save();

        return redirect('/users/$id');
    }

    public function destroy($id)
    {
       User::findOrFail($id)->delete();
        return redirect('/');
    }
}
