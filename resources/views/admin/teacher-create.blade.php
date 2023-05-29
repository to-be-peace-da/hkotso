<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление преподавателя</h2>
                <form class="form-fields" action="{{ route('teacher.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="surname" class="">Фамилия</label>
                        <input autofocus autocomplete="off" type="text" name="surname" id="surname" placeholder="Музыко"
                               value="{{ old('surname') }}">
                    </div>
                    @error('surname')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="name" class="">Имя</label>
                        <input autocomplete="off" type="text" name="name" id="name" placeholder="Никита"
                               value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="patronymic" class="">Отчество</label>
                        <input autocomplete="off" type="text" name="patronymic" id="patronymic"
                               placeholder="Александрович" value="{{ old('patronymic') }}">
                    </div>
                    @error('patronymic')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
