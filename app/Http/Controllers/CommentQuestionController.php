<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentQuestion as Comment;
use App\Question;

class CommentQuestionController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    // добавить новый комментарий к вопросу
    public function store(Question $question)
    {
      $comment = new Comment();
      $comment->user_id = request()->user()->id;
      $comment->rating = 0;
      $comment->text = request('text');

      $question->comments()->save($comment);
      return back();
    }
}
