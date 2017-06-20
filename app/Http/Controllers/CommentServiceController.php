<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentService as Comment;
use App\Service;

class CommentServiceController extends Controller
{

      public function __construct()
      {
        $this->middleware('auth');
      }

      // добавить новый комментарий к вопросу
      public function store(Service $service)
      {
        $comment = new Comment();
        $comment->user_id = request()->user()->id;
        $comment->text = request('text');
        $comment->price = request('price');
        $service->comments()->save($comment);
        return back();
}
}
