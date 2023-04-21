<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest('id')->paginate(5);

        return view('advertisements.index', [
            'advertisements' => $advertisements,
        ]);
    }

    public function store(StoreAdvertisementRequest $request)
    {
        Advertisement::create($request->validated());

        return back();
    }

    public function show(Advertisement $advertisement)
    {
        return view('advertisements.show', [
            'advertisement' => $advertisement,
        ]);
    }

    public function edit(Advertisement $advertisement)
    {
        return view('advertisements.edit', [
            'advertisement' => $advertisement,
        ]);
    }

    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $advertisement->update($request->validated());

        return redirect()->route('main.index');
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        return redirect()->route('main.index');
    }
}
