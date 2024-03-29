<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest('id')->paginate(10);

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

    public function edit(News $singleNews)
    {
        return view('news.edit', [
            'singleNews' => $singleNews,
        ]);
    }

    public function update(UpdateNewsRequest $request, News $singleNews)
    {
        $formFields = $request->validated();

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

        return back()->with('message', 'Новость изменена');
    }

    public function store(StoreNewsRequest $request)
    {
        $formFields = $request->validated();

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

        return back()->with('message', 'Новость создана');
    }

    public function destroy(News $singleNews)
    {
        if ($singleNews->image !== ('news_images/' . 'default.jpg')) {
            File::delete(public_path('storage/' . $singleNews->image));
        }

        $singleNews->delete();

        return to_route('main.index')->with('message', 'Новость удалена');
    }
}
