<x-layout>
    <div class="even">
        <div class="container">
            <div class="schedule-create">
                <h2>Добавление замены</h2>
                <form class="form-fields" action="{{ route('substitution.store') }}" method="post">
                    @csrf
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
                        <label for="group_id" class="">Группа</label>
                        <select name="group_id" id="group_id">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('group_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="subject_id" class="">Пара</label>
                        <select name="subject_id" id="subject_id">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('subject_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="audience_id" class="">Кабинет</label>
                        <select name="audience_id" id="audience_id">
                            @foreach($audiences as $audience)
                                <option value="{{ $audience->id }}">{{ $audience->number }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('audience_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="teacher_id" class="">Преподаватель</label>
                        <select name="teacher_id" id="teacher_id">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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