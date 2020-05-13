<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        //var_dump($article->name);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:1',
        ]);
        var_dump($data);
        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')
        ->with('success','VERY NICE');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $this->validate($request, [   
        'name' => 'required|unique:articles,name,' . $article->id,
        'body' => 'required|min:1',
    ]);

    $article->fill($data);
    $article->save();
    return redirect()
        ->route('articles.index');
    }
}
