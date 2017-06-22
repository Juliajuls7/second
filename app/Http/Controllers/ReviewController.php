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
  public function store(Service $service)
  {
    $review = new Review();
    $review->quality = request()->quality;
    $review->price = request()->price;
    $review->politeness =request()->politeness;
    $review->text = request('text');
    $service->review_au->save($review);
    return back();
  }

}
