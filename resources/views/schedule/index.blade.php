<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h1>Расписание</h1>
                <form class="form-fields" action="{{ route('schedule.show') }}" method="get">
                    <div class="label-and-input">
                        <label for="group">Группа</label>
                        <select class="" id="group" name="group_id">
                            @foreach($groups->sortBy('name') as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="label-and-input">
                        <label for="course">Курс</label>
                        <select class="" id="course" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="label-and-input">
                        <label for="department">Отделение</label>
                        <select class="" id="department" name="department_id">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="label-and-input">
                        <label for="semester">Полугодие</label>
                        <select class="" id="semester" name="semester_id">
                            @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit">Показать</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
