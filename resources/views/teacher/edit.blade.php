<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Изменить преподавателя</h2>
                <form class="form-fields" action="{{ route('teacher.update', $teacher) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="label-and-input">
                        <label for="surname" class="">Фамилия</label>
                        <input autofocus autocomplete="off" type="text" name="surname" id="surname"
                               value="{{ $teacher->surname }}">
                    </div>
                    @error('surname')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="name" class="">Имя</label>
                        <input autocomplete="off" type="text" name="name" id="name"
                               value="{{ $teacher->name }}">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="patronymic" class="">Отчество</label>
                        <input autocomplete="off" type="text" name="patronymic" id="patronymic"
                               value="{{ $teacher->patronymic }}">
                    </div>
                    @error('patronymic')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Изменить</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
