<x-layout>
    <div class="even">
        <div class="container">
            <form action="{{ route('schedule.show') }}" method="get">
                <label for="group">Группа</label>
                <select class="" id="group" name="group_id">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Показать</button>
            </form>
        </div>
    </div>
</x-layout>
