<?php

namespace App\Http\Controllers;
use App\Subcategory;
use App\Article;
use App\Category;
use App\Rate;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index()
    {
          return view('articles.index', ['articles' => Article::orderByDesc('created_at')->paginate(8)]);
    }


    public function create()
    {
        return view('articles.create',['categories'=> Category::all()]);
    }


    public function store(Request $request)
    {
        $article = new Article();
        $article->subcategory_id = $request->subcategory;
        $article->head = $request->head;
        $article->text = $request->text;
        $article->rating = 0;
        $request->user()->articles()->save($article);

        return redirect('/articles');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $likeOn = 0;
    if (Auth::check()) {
        if ($article->rates->where('user_id', Auth::user()->id)->count()>0) {
            $likeOn = 1;
        }
            } else return  view ('articles.show', [
              'article' => $article,
              'comments' => $article->comments,
              'likeOn' => $likeOn,
            ]);
        return view ('articles.show', [
          'article' => $article,
          'comments' => $article->comments,
          'likeOn' => $likeOn,
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit',[
          'article'=> $article,
          'categories'=> Category::all(),

        ]);
    }

    public function save(Request $request, Article $article)
    {
        $article->subcategory_id = $request->subcategory;
        $article->head = $request->head;
        $article->text = $request->text;
        $article->save();
        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }

    public function setlike(Request $request, Article $article)
    {
        if ($article->rates->where('user_id', Auth::user()->id)->count()>0) {
          $article->user->rating_ex -= 1;
          $article->user->save();
          $article->rates()->where('user_id', Auth::user()->id)->delete();
          return back();
        } else {
          $rate = new Rate();
          $rate->user_id = Auth::user()->id;
          $rate->value = 1;
          $article->rates()->save($rate);
          $article->user->rating_ex += 1;
          $article->user->save();
          return back();
        }
    }
}
