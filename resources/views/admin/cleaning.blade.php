<x-layout>
    <div class="even">
        <div class="container">
            <div class="great-purge uniq-wrapper">
                <h1>Большая чистка</h1>
                <div class="uniq-fields">
                    <form class="" action="{{ route('admin.destroy-all-news') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить все <strong>новости</strong></button>
                    </form>
                    <form class="" action="{{ route('admin.destroy-all-schedules') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить всё <strong>расписание</strong></button>
                    </form>
                    <form class="" action="{{ route('admin.destroy-all-substitutions') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить все <strong>замены</strong></button>
                    </form>
                    <form class="" action="{{ route('admin.destroy-all-teachers') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить всех <strong>преподавателей</strong></button>
                    </form>
                    <form class="" action="{{ route('admin.destroy-all-subjects') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить все <strong>предметы</strong></button>
                    </form>
                    <form class="" action="{{ route('admin.destroy-all-groups') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Вы точно уверены? Результат этого действия необратим')" type="submit" class="">Удалить все <strong>группы</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
