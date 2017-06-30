<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use App\Question;
use Auth;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index()
    {
          return view('questions.index', ['questions' => Question::orderByDesc('created_at')->paginate(8)]);

    }


    public function create()
    {
      return view ('questions.create', [
        'categories' => Category::all()
      ]);
    }


    public function store(Request $request)
    {
        $question = new Question();
        // $question->category_id = $request->category;
        $question->subcategory_id = $request->subcategory;
        $question->head = $request->head;
        $question->text = $request->text;
        $request->user()->questions()->save($question);

        return redirect('/questions');
    }


    public function show($id)
    {
        $question = Question::findOrFail($id);

        $comments = collect([]);
        foreach ($question->comments as $comment) {
          $likeOn = 0;
          if ($comment->rates->where('user_id', Auth::user()->id)->count()>0) {
              $likeOn = 1;
          }

          $comments->push([$comment,$likeOn]);
        }

        return view ('questions.show', [
          'question' => $question,
          'comments' => $comments,
        ]);
    }


    public function edit($id)
    {
        return view('questions.edit',['question'=>Question::findOrFail($id),'categories'=> Category::all()]);
    }

    public function save(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->subcategory_id = $request->subcategory;
        $question->head = $request->head;
        $question->text = $request->text;
        $question->save();
        return redirect('/questions');
    }

    public function destroy($id)
    {
       Question::findOrFail($id)->delete();
        return redirect('/questions');
    }

}
