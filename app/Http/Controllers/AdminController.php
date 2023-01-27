<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.sign-in');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect(route('main.index'));
        }

        return back()->withErrors(['name' => 'Ошибка']);
    }
}
