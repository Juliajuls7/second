<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentArticle as Comment;
use App\Article;

class CommentArticleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  // добавить новый комментарий к вопросу
  public function store(Article $article)
  {
    $comment = new Comment();
    $comment->user_id = request()->user()->id;
    $comment->rating = 0;
    $comment->text = request('text');

    $article->comments()->save($comment);
    return back();
  }
}
