<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper groups-create">
                <h2>Изменить группу</h2>
                <form class="form-fields" action="{{ route('group.update', $group) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input autofocus autocomplete="off" type="text" name="name" id="name" value="{{ $group->name }}">
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
