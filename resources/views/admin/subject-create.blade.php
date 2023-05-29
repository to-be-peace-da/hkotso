<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление предмета</h2>
                <form class="form-fields" action="{{ route('subject.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input autofocus autocomplete="off" type="text" name="name" id="name"
                               placeholder="Разработка дизайна веб-приложений">
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
