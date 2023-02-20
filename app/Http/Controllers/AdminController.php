<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateAdminRequest;
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

    public function authenticate(AuthenticateAdminRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            $request->session()->regenerate();

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

        return redirect()->route('main.index');
    }

    public function index()
    {
        return view('admin.panel');
    }

    public function newsCreate()
    {
        return view('admin.news-create');
    }

    public function advertisementCreate()
    {
        return view('admin.advertisement-create');
    }
}
