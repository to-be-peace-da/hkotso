<x-layout>
    <div class="even">
        <div class="container">
            <div class="admin-panel">
                <div class="admin-options">
                    <a href="{{ route('admin.news-create') }}">
                        <h2>Создать новость</h2>
                    </a>
                    <a href="{{ route('admin.advertisement-create') }}">
                        <h2>Создать объявление</h2>
                    </a>
                    <a href="{{ route('admin.schedule-create') }}">
                        <h2>Добавить расписание</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
