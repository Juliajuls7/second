<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
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

        return view ('questions.show', [
          'question' => $question,
          'comments' => $question->comments
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Question::findOrFail($id)->delete();
        return redirect('/questions');
    }
}
