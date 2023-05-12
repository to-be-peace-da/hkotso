<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Изменение расписания</h2>
                <form class="form-fields" action="{{ route('schedule.update', $schedule) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="label-and-input">
                        <label for="group_id" class="">Группа</label>
                        <select name="group_id" id="group_id">
                            @foreach($groups->sortBy('name') as $group)
                                <option
                                    @if($schedule->group->id === $group->id)
                                        selected
                                    @endif
                                    value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('group_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="course_id" class="">Курс</label>
                        <select name="course_id" id="course_id">
                            @foreach($courses as $course)
                                <option
                                    @if($schedule->course->id === $course->id)
                                        selected
                                    @endif
                                    value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('course_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="department_id" class="">Отделение</label>
                        <select name="department_id" id="department_id">
                            @foreach($departments->sortBy('name') as $department)
                                <option
                                    @if($schedule->department->id === $department->id)
                                        selected
                                    @endif
                                    value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('department_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="semester_id" class="">Полугодие</label>
                        <select name="semester_id" id="semester_id">
                            @foreach($semesters as $semester)
                                <option
                                    @if($schedule->semester->id === $semester->id)
                                        selected
                                    @endif
                                    value="{{ $semester->id }}">{{ $semester->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('semester_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="subject_id" class="">Пара</label>
                        <select name="subject_id" id="subject_id">
                            @foreach($subjects->sortBy('name') as $subject)
                                <option
                                    @if($schedule->subject->id === $subject->id)
                                        selected
                                    @endif
                                    value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subject_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="order_id" class="">Порядок пары</label>
                        <select name="order_id" id="order_id">
                            @foreach($orders as $order)
                                <option
                                    @if($schedule->order->id === $order->id)
                                        selected
                                    @endif
                                    value="{{ $order->id }}">{{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('order_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="part_id" class="">Неделя</label>
                        <select name="part_id" id="part_id">
                            @foreach($parts as $part)
                                <option
                                    @if($schedule->part->id === $part->id)
                                        selected
                                    @endif
                                    value="{{ $part->id }}">{{ $part->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('part_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="audience_id" class="">Кабинет</label>
                        <input type="number" id="audience_id" name="audience_id" value="{{ $schedule->audience->id }}">
                        {{--                        <select name="audience_id" id="audience_id">--}}
                        {{--                            @foreach($audiences->sortBy('number') as $audience)--}}
                        {{--                                <option--}}
                        {{--                                    @if($schedule->audience->id === $audience->id)--}}
                        {{--                                        selected--}}
                        {{--                                    @endif--}}
                        {{--                                    value="{{ $audience->id }}">{{ $audience->number }}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                    </div>
                    @error('audience_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="teacher_id" class="">Преподаватель</label>
                        <select name="teacher_id" id="teacher_id">
                            @foreach($teachers->sortBy('surname') as $teacher)
                                <option
                                    @if($schedule->teacher->id === $teacher->id)
                                        selected
                                    @endif
                                    value="{{ $teacher->id }}">{{ $teacher->surname . " " . $teacher->name . " " . $teacher->patronymic }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('teacher_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="day_id" class="">День</label>
                        <select name="day_id" id="day_id">
                            @foreach($days as $day)
                                <option
                                    @if($schedule->day->id === $day->id)
                                        selected
                                    @endif
                                    value="{{ $day->id }}">{{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('day_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Изменить</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
