<x-layout>
    <div class="even">
        <div class="container">
            <div class="schedule-create">
                <h2>Добавление преподавателя</h2>
                <form class="form-fields" action="{{ route('teacher.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Преподаватель</label>
                        <input type="text" name="name" id="name">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
