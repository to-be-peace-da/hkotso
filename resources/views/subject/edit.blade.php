<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Изменение предмета</h2>
                <form class="form-fields" action="{{ route('subject.update', $subject) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input autofocus autocomplete="off" type="text" name="name" id="name"
                               value="{{ $subject->name }}">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Изменить</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
