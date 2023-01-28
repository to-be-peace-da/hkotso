<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all()->reverse();

        return view('advertisements.index', [
            'advertisements' => $advertisements,
        ]);
    }

    public function show(Advertisement $advertisement)
    {
        return view('advertisements.show', [
            'advertisement' => $advertisement,
        ]);
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return back();
    }
}
