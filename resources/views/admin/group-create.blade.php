<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление группы</h2>
                <form class="form-fields" action="{{ route('group.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input type="text" name="name" id="name" placeholder="ИС-41">
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
