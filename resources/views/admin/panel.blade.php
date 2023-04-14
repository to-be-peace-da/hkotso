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
                    <a href="{{ route('admin.substitution-create') }}">
                        <h2>Добавить замену</h2>
                    </a>
                    <a href="{{ route('admin.group-create') }}">
                        <h2>Добавить группу</h2>
                    </a>
                    <a href="{{ route('admin.subject-create') }}">
                        <h2>Добавить предмет</h2>
                    </a>
                    <a href="{{ route('admin.teacher-create') }}">
                        <h2>Добавить преподавателя</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
