<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentQuestion as Comment;
use App\Question;
use App\Rate;
use Auth;
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
    
      $comment->text = request('text');

      $question->comments()->save($comment);
      return back();
    }

    public function setlike(Request $request,Question $question, Comment $comment)
    {
        if ($comment->rates->where('user_id', Auth::user()->id)->count()>0) {
          $comment->rates()->where('user_id', Auth::user()->id)->delete();
          $comment->user->rating_ex -= 1;
          $comment->user->save();
          return back();
        } else {
          $rate = new Rate();
          $rate->user_id = Auth::user()->id;
          $rate->value = 1;
          $comment->rates()->save($rate);
          $comment->user->rating_ex += 1;
          $comment->user->save();
          return back();
        }
    }
}
