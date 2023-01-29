<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->reverse();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request
            ->validate([
                'name' => ['required', Rule::unique('news', 'name')],
                'text' => ['required'],
                'image' => ['file', 'image']
            ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request
                ->file('image')
                ->store('news_images', 'public');

            Image::make(public_path('storage/' . $formFields['image']))
                ->encode('webp', 0)
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save();
        }

        News::create($formFields);

        return back();
    }

    public function show(News $singleNews)
    {
        return view('news.show', [
            'singleNews' => $singleNews
        ]);
    }

    public function edit(News $singleNews)
    {
        return view('news.edit', [
            'singleNews' => $singleNews,
        ]);
    }

    public function update(Request $request, News $singleNews)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'text' => ['required'],
            'image' => ['file', 'image']
        ]);

        if ($request->hasFile('image')) {
            if ($singleNews->image !== ('news_images/' . 'default.jpg')) {
                File::delete(public_path('storage/' . $singleNews->image));
            }

            $formFields['image'] = $request
                ->file('image')
                ->store('news_images', 'public');

            Image::make(public_path('storage/' . $formFields['image']))
                ->encode('webp', 0)
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save();
        }

        $singleNews->update($formFields);

        return redirect()->route('main.index');
    }

    public function destroy(News $singleNews)
    {
        if ($singleNews->image !== ('news_images/' . 'default.jpg')) {
            File::delete(public_path('storage/' . $singleNews->image));
        }

        $singleNews->delete();

        return redirect()->route('main.index');
    }
}
