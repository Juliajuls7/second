<?php

namespace App\Http\Controllers;
use App\User;
use App\City;
use App\Region;
use App\Education;
use App\Service;
use App\Question;
use App\Article;
use App\Subcategory;
use App\Category;
use App\Rate;
use App\Review;
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
          return view('executors.showexecutor', ['users' => User::orderByDesc('rating_ex')->paginate(15)]);
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

            'articles'=> $user->articles(),
            'questions'=> $user->questions(),
        ]);
    }


    public function edit($id)
    {
        return view('users.edit',[
          'user'=>User::findOrFail($id),
          'regions' => Region::all(),
          'educations'=> Education::all()
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
        // $user->photo = $request->photo;
        $user->save();

        return back();
    }

    public function destroy($id)
    {
       User::findOrFail($id)->delete();
        return redirect('/');
    }

    public function showservices($id)
    {
      $user = User::findOrFail($id);

      return view ('users.showservices', [

            'user' => $user,
            'services'=> $user->services()->orderByDesc('created_at')->paginate(8),

        ]);
    }
    public function showworks($id)
    {
      $user = User::findOrFail($id);

      return view ('users.showworks', [

            'user' => $user,
            'services'=>$user->doneservices()->orderByDesc('created_at')->paginate(8),

        ]);
    }
    public function showarticles($id)
    {
      $user = User::findOrFail($id);

      return view ('users.showarticles', [

            'user' => $user,
            'articles'=>$user->articles()->orderByDesc('created_at')->paginate(8),

        ]);
    }
    public function showreviews($id)
    {
      $user = User::findOrFail($id);
      $reviews = collect([]);

      foreach ($user->doneservices as $service) {
        if ($service->review_author!=0) {
          $reviews->push($service->review_au);
        }
      }

      return view ('users.showreviews', [
            'user' => $user,
            'reviews'=>$reviews->sortByDesc('created_at')
        ]);
    }
    public function showreviews2($id)
    {
      $user = User::findOrFail($id);
      $reviews = collect([]);

      foreach ($user->services as $service) {
        if ($service->review_executor!=0) {
          $reviews->push($service->review_ex);
        }
      }

      return view ('users.showreviews2', [
            'user' => $user,
            'reviews'=>$reviews->sortByDesc('created_at')
        ]);
    }

}
