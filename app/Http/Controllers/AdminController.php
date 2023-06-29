<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateAdminRequest;
use App\Models\Audience;
use App\Models\Course;
use App\Models\Day;
use App\Models\Department;
use App\Models\Group;
use App\Models\News;
use App\Models\Order;
use App\Models\Part;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Substitution;
use App\Models\Teacher;

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

            return to_route('admin.index');
        }

        return back()
            ->withErrors(['password' => 'Ошибка']);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('main.index');
    }

    public function index()
    {
        return view('admin.panel');
    }

    public function newsCreate()
    {
        return view('admin.news-create');
    }

//    public function advertisementCreate()
//    {
//        return view('admin.advertisement-create');
//    }

    public function scheduleCreate()
    {
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();
        $days = Day::all();
        $courses = Course::all();
        $departments = Department::all();
        $parts = Part::all();
        $semesters = Semester::all();

        return view('admin.schedule-create', [
            'orders' => $orders,
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
            'days' => $days,
            'parts' => $parts,
            'semesters' => $semesters,
        ]);
    }

    public function substitutionCreate()
    {
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $departments = Department::all();

        return view('admin.substitution-create', [
            'orders' => $orders,
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
        ]);
    }

    public function groupCreate()
    {
        $groups = Group::all();

        return view('admin.group-create', [
            'groups' => $groups,
        ]);
    }

    public function subjectCreate()
    {
        $subjects = Subject::all();

        return view('admin.subject-create', [
            'subjects' => $subjects,
        ]);
    }

    public function teacherCreate()
    {
        $teachers = Teacher::all();

        return view('admin.teacher-create', [
            'teachers' => $teachers,
        ]);
    }

    public function cleaning()
    {
        return view('admin.cleaning');
    }

    public function destroyAllSchedules()
    {
        Schedule::query()->delete();

        return back()->with('message', 'Всё расписание удалено');
    }

    public function destroyAllSubstitutions()
    {
        Substitution::query()->delete();

        return back()->with('message', 'Все замены удалены');
    }

    public function destroyAllTeachers()
    {
        Teacher::query()->delete();

        return back()->with('message', 'Все преподаватели удалены');
    }

    public function destroyAllGroups()
    {
        Group::query()->delete();

        return back()->with('message', 'Все группы удалены');
    }

    public function destroyAllSubjects()
    {
        Subject::query()->delete();

        return back()->with('message', 'Все предметы удалены');
    }

    public function destroyAllNews()
    {
        News::query()->delete();

        return back()->with('message', 'Все новости удалены');
    }
}
