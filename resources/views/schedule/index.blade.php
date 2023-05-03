<x-layout>
    <div class="even">
        <div class="container">
            <form action="{{ route('schedule.show') }}" method="get">
                <label for="group">Группа</label>
                <select class="" id="group" name="group_id">
                    @foreach($groups->sortBy('name') as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                <label for="course">Курс</label>
                <select class="" id="course" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                <label for="department">Отделение</label>
                <select class="" id="department" name="department_id">
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Показать</button>
            </form>
        </div>
    </div>
</x-layout>
