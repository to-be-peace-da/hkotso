<x-layout>
    <div class="even">
        <div class="container">
            <div class="schedule">
                <div class="title">
                    <h1>{{ $schedulesByGroupId->first()->group->name }}</h1>
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
                        @foreach($schedulesByGroupId->sortBy('order_id') as $group)
                            @if($group->day->id == $day->id)
                                <tr>
                                    <td>{{ $group->order->name }}</td>
                                    <td>{{ $group->subject->name }}</td>
                                    <td>{{ $group->teacher->name }}</td>
                                    <td>{{ $group->audience->number }}</td>
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
