<?php

namespace App\Http\Controllers;
use App\User;
use App\City;
use App\Education;
use App\Service;
use App\Question;
use App\Article;
use App\Subcategory;
use App\Category;
use App\Rate;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
          return view('users.index', ['users' => User::orderByDesc('created_at')->paginate(20)]);
    }

    public function showexecutor()
    {
          return view('executors.showexecutor', ['users' => User::orderByDesc('created_at')->paginate(15)]);
    }

    public function show($id)
    {
      $user = User::findOrFail($id);

      // foreach ($user->articles as $article) {
      //   $rating+=$article->rates->sum('value');
      // }
      //
      // foreach ($user->commentquestions as $comment) {
      //   $rating+=$comment->rates->sum('value');
      // }

      return view ('users.show', [
          
            'user' => $user,
            'services'=> $user->services()->orderByDesc('created_at')->get(),
            'articles'=> $user->articles(),
            'questions'=> $user->questions(),
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
