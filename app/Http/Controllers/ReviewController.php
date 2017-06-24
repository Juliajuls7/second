<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Review;

class ReviewController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  // добавить отзыв о задаче
  public function store(Request $request,Service $service)
  {
    $review = new Review();
    $review->key1 = $request->key1;
    $review->key2 = $request->key2;
    $review->key3 = $request->key3;
    $review->text = $request->text;
    $service->state_service_id = $request->state;
    $service->review_au()->save($review);
    $service->review_author = $review->id;
    $service->save();
    return back();
  }

}
