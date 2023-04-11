<x-layout>
    <div class="even">
        <div class="container">
            <div class="schedule">
                <div class="title">
                    <h1>{{ $schedules->first()->group->name }}</h1>
                </div>
                @foreach(\App\Models\Day::all() as $day)

                    <div class="day">
                        <h2>{{ $day->name }}</h2>
                    </div>
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
                        @php
                            $substitutionShowed = false;
                        @endphp
                        @foreach($substitutions as $substitution)

                            @if($substitution->day->id === $day->id)
                                @if($substitutionShowed === false)
                                    <p>Замена на {{ \Carbon\Carbon::create($substitution->date)->format('d.m.Y') }}</p>
                                @endif
                                <tr>
                                    <td>{{ $substitution->order->name }}</td>
                                    <td>{{ $substitution->subject->name }}</td>
                                    <td>{{ $substitution->teacher->name }}</td>
                                    <td>{{ $substitution->audience->number }}</td>
                                </tr>
                                @php
                                    $substitutionShowed = true;
                                @endphp
                            @endif
                        @endforeach
                        </tbody>
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
                                    <td>{{ $schedule->teacher->name }}</td>
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



