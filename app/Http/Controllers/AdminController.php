<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateAdminRequest;
use App\Models\Advertisement;
use App\Models\Audience;
use App\Models\Day;
use App\Models\Group;
use App\Models\News;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Teacher;
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

    public function scheduleCreate()
    {
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();
        $days = Day::all();

        return view('admin.schedule-create', [
            'orders' => $orders,
            'groups' => $groups,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
            'days' => $days,
        ]);
    }

    public function substitutionCreate()
    {
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();

        return view('admin.substitution-create', [
            'orders' => $orders,
            'groups' => $groups,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
        ]);
    }

    public function groupCreate()
    {
        return view('admin.group-create');
    }

    public function subjectCreate()
    {
        return view('admin.subject-create');
    }

    public function teacherCreate()
    {
        return view('admin.teacher-create');
    }
}
