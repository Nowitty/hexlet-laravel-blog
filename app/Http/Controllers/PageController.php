<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    public function about()
    {
        $articles = Article::all();
        $params = [];
        return view('page.about', $params);
    }
}
