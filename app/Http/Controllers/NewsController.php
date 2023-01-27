<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->reverse();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function show(News $singleNews)
    {
        return view('news.show', [
            'singleNews' => $singleNews
        ]);
    }
}
