<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.sign-in');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request
                ->session()
                ->regenerate();

            return redirect(route('admin.index'));
        }

        return back()
            ->withErrors(['password' => 'Ошибка']);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return back();
    }

    public function index()
    {
        return view('admin.panel');
    }
}
