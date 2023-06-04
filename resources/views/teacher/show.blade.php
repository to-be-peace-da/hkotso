@php use Carbon\Carbon; @endphp
<x-layout>
    <div class="even">
        <div class="teacher-schedule-and-substitution">
            <div class="container">
                <div class="title">
                    <h2>{{ $teacher->surname . ' ' . $teacher->name . ' ' . $teacher->patronymic }}</h2>
                    @if(Carbon::now()->weekOfYear % 2 === 0)
                        <h2>{{ Carbon::now()->format('d.m.Y') }} - Знаменатель</h2>
                    @else
                        <h2>{{ Carbon::now()->format('d.m.Y') }} - Числитель</h2>
                    @endif
                </div>
            </div>
            @foreach($days as $day)
                <div class="even">
                    <div class="container">
                        <div class="day">
                            <h2>{{ $day->name }}</h2>
                        </div>
                    </div>
                </div>
                @php
                    $substitutionShowed = false;
                @endphp
                <div class="substitution">
                    <div class="odd">
                        <div class="container">
                            @foreach($substitutions->where('day_id', '=', $day->id)->sortBy('order')->sortBy('group') as $substitution)
                                @if($substitutionShowed === false)
                                    <div class="substitution-date">
                                        <p>Замена на {{ Carbon::create($substitution->date)->format('d.m.Y') }}</p>
                                    </div>
                                    <div class="substitution-head">
                                        <div class="items">
                                            <div class="item">
                                                <p>№</p>
                                            </div>
                                            <div class="item">
                                                <p>Группа</p>
                                            </div>
                                            <div class="item">
                                                <p>Курс</p>
                                            </div>
                                            <div class="item">
                                                <p>Отделение</p>
                                            </div>
                                            <div class="item">
                                                <p>Пара</p>
                                            </div>
                                            <div class="item">
                                                <p>Кабинет</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $substitutionShowed = true;
                                @endphp
                                @if($substitution->day->id === $day->id)
                                    <div class="substitution-items">
                                        <div class="items">
                                            <div class="item">
                                                <p>{{ $substitution->order->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $substitution->group->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $substitution->course->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $substitution->department->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $substitution->subject->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $substitution->audience->number }}</p>
                                            </div>
                                            <div class="item">
                                                <div class="admin-tools">
                                                    @if(auth()->check() && auth()->user()->is_admin)
                                                        <form
                                                            action="{{ route('substitution.destroy', $substitution) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                                <i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                        <form action="{{ route('substitution.edit', $substitution) }}"
                                                              method="get">
                                                            <button type="submit"><i class="fa-solid fa-pen"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="schedule">
                    <div class="even">
                        <div class="container">
                            <div class="schedule-head">
                                <div class="items">
                                    <div class="item">
                                        <p>№</p>
                                    </div>
                                    <div class="item">
                                        <p>Группа</p>
                                    </div>
                                    <div class="item">
                                        <p>Курс</p>
                                    </div>
                                    <div class="item">
                                        <p>Отделение</p>
                                    </div>
                                    <div class="item">
                                        <p>Полугодие</p>
                                    </div>
                                    <div class="item">
                                        <p>Пара</p>
                                    </div>
                                    <div class="item">
                                        <p>Кабинет</p>
                                    </div>
                                </div>
                            </div>
                            @foreach($schedules->sortBy('order')->sortBy('group')  as $schedule)
                                @if($schedule->day->id === $day->id)
                                    <div class="schedule-items">
                                        <div class="items">
                                            <div class="item">
                                                <p>{{ $schedule->order->name . ' - ' . $schedule->part->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->group->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->course->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->department->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->semester->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->subject->name }}</p>
                                            </div>
                                            <div class="item">
                                                <p>{{ $schedule->audience->number }}</p>
                                            </div>
                                            <div class="item">
                                                <div class="admin-tools">
                                                    @if(auth()->check() && auth()->user()->is_admin)
                                                        <form action="{{ route('schedule.destroy', $schedule) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                                <i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                        <form action="{{ route('schedule.edit', $schedule) }}"
                                                              method="get">
                                                            <button type="submit"><i class="fa-solid fa-pen"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
