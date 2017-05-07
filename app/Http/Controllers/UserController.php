<?php

namespace App\Http\Controllers;
use App\User;
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
        return view('questions.create',['subcategories'=> Subcategory::all()]);
    }

    
    public function store(Request $request)
    {
        $question = new Question();
        $question->subcategory_id = $request->subcategory;
        $question->head = $request->head;
        $question->text = $request->text;
        $request->user()->questions()->save($question);
        
        return redirect('/questions');
    }

  
    public function show($id)
    {
        return view ('questions.show', [
            'question' => Question::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('questions.edit',[
            'question'=>Question::findOrFail($id),
            'subcategories'=> Subcategory::all(),
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
