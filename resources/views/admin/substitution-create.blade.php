<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление замены</h2>
                <form class="form-fields" action="{{ route('substitution.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="group_id" class="">Группа</label>
                        <select name="group_id" id="group_id">
                            @foreach($groups->sortBy('name') as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
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
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('department_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="subject_id" class="">Пара</label>
                        <select name="subject_id" id="subject_id">
                            @foreach($subjects->sortBy('name') as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                                <option value="{{ $order->id }}">{{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('order_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="audience_id" class="">Кабинет</label>
                        <input value="{{ old('audience_id') }}" type="number" name="audience_id" id="audience_id" min="1" max="500">
{{--                        <select name="audience_id" id="audience_id">--}}
{{--                            @foreach($audiences->sortBy('number') as $audience)--}}
{{--                                <option value="{{ $audience->id }}">{{ $audience->number }}</option>--}}
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
                                    value="{{ $teacher->id }}">{{ $teacher->surname . " " . $teacher->name . " " . $teacher->patronymic }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('teacher_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="date" class="">День</label>
                        <input type="date" name="date" id="date">
                    </div>
                    @error('date')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
