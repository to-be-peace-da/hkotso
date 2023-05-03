<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\News;

class MainController extends Controller
{
    public function index()
    {
//        $sections = Section::tree()->get()->toTree();
        $news = News::latest('id')->take(3)->get();
        $advertisements = Advertisement::latest('id')->take(5)->get();

        return view('main', [
            'news' => $news,
            'advertisements' => $advertisements,
        ]);
    }
}
