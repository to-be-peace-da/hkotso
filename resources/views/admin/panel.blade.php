<x-layout>
    <div class="even">
        <div class="container">
            <div class="admin-panel">
                <div class="admin-options">
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.news-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/news.svg') }}" alt="news">
                                </div>
                                <div class="title">
                                    <h2>Создать новость</h2>
                                </div>
                            </div>
                        </a>
                    </div>
{{--                    <div class="tool-wrapper">--}}
{{--                        <a href="{{ route('admin.advertisement-create') }}">--}}
{{--                            <div class="tool">--}}
{{--                                <div class="icon">--}}
{{--                                    <img src="{{ asset('storage/images/advertisement.svg') }}" alt="advertisement">--}}
{{--                                </div>--}}
{{--                                <div class="title">--}}
{{--                                    <h2>Создать объявление</h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.schedule-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/schedule.svg') }}" alt="schedule">
                                </div>
                                <div class="title">
                                    <h2>Добавить расписание</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.substitution-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/substitution.svg') }}" alt="substitution">
                                </div>
                                <div class="title">
                                    <h2>Добавить замену</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.group-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/group.svg') }}" alt="group">
                                </div>
                                <div class="title">
                                    <h2>Добавить группу</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.subject-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/subject.svg') }}" alt="subject">
                                </div>
                                <div class="title">
                                    <h2>Добавить предмет</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tool-wrapper">
                        <a href="{{ route('admin.teacher-create') }}">
                            <div class="tool">
                                <div class="icon">
                                    <img src="{{ asset('storage/images/teacher.svg') }}" alt="teacher">
                                </div>
                                <div class="title">
                                    <h2>Добавить преподавателя</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
