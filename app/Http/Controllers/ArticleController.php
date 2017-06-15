<?php

namespace App\Http\Controllers;
use App\Subcategory;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

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

        return view ('articles.show', [
          'article' => $article,
          'comments' => $article->comments
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
}
