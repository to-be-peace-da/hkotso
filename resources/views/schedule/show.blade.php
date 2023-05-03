<x-layout>
    <div class="even">
        <div class="container">
            <div class="schedule">
                <div class="title">
                    <h1>{{ $schedules->first()->group->name . " - " . $schedules->first()->department->name . " - " . $schedules->first()->course->name . " курс" }}</h1>
                </div>
                @foreach($days as $day)
                    <div class="day">
                        <h2>{{ $day->name }}</h2>
                    </div>
                    @php
                        $substitutionShowed = false;
                    @endphp
                    @foreach($substitutions->where('day_id', '=', $day->id) as $substitution)
                        @if($substitutionShowed === false)
                            <p>Замена на {{ \Carbon\Carbon::create($substitution->date)->format('d.m.Y') }}</p>
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>№</td>
                                    <td>Пара</td>
                                    <td>Преподаватель</td>
                                    <td>Кабинет</td>
                                </tr>
                                </thead>
                                @endif
                                @php
                                    $substitutionShowed = true;
                                @endphp
                                <tbody>
                                @if($substitution->day->id === $day->id)
                                    <tr>
                                        <td>{{ $substitution->order->name }}</td>
                                        <td>{{ $substitution->subject->name }}</td>
                                        <td>
                                            <a href="{{ route('teacher.show', $substitution->teacher) }}">{{ $substitution->teacher->surname .  " " . $substitution->teacher->name . ". " . $substitution->teacher->patronymic . "." }}</a>
                                        </td>
                                        <td>{{ $substitution->audience->number }}</td>
                                    </tr>
                                @endif
                                </tbody>
                                @endforeach
                            </table>

                            <p>=============================================================================</p>

                            <table class="table">
                                <thead>
                                <tr>
                                    <td>№</td>
                                    <td>Пара</td>
                                    <td>Преподаватель</td>
                                    <td>Кабинет</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules->sortBy('order_id') as $schedule)
                                    @if($schedule->day->id === $day->id)
                                        <tr>
                                            <td>{{ $schedule->order->name }}</td>
                                            <td>{{ $schedule->subject->name }}</td>
                                            <td>
                                                <a href="{{ route('teacher.show', $schedule->teacher) }}">{{ $schedule->teacher->surname .  " " . $schedule->teacher->name . " " . $schedule->teacher->patronymic . " " }}</a>
                                            </td>
                                            <td>{{ $schedule->audience->number }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            @endforeach
            </div>
        </div>
    </div>
</x-layout>

