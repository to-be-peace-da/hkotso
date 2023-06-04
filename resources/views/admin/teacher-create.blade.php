<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление преподавателя</h2>
                <form class="form-fields" action="{{ route('teacher.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="surname" class="">Фамилия</label>
                        <input autofocus autocomplete="off" type="text" name="surname" id="surname" placeholder="Музыко"
                               value="{{ old('surname') }}">
                    </div>
                    @error('surname')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="name" class="">Имя</label>
                        <input autocomplete="off" type="text" name="name" id="name" placeholder="Никита"
                               value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="patronymic" class="">Отчество</label>
                        <input autocomplete="off" type="text" name="patronymic" id="patronymic"
                               placeholder="Александрович" value="{{ old('patronymic') }}">
                    </div>
                    @error('patronymic')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
    <div class="teacher-action">
        <div class="odd">
            <div class="container">
                <div class="teacher-head">
                    <div class="items">
                        <div class="item">
                            <p>ID</p>
                        </div>
                        <div class="item">
                            <p>Фамилия</p>
                        </div>
                        <div class="item">
                            <p>Имя</p>
                        </div>
                        <div class="item">
                            <p>Отчество</p>
                        </div>
                        <div class="item">
                            <p>Дата создания</p>
                        </div>
                        <div class="item">
                            <p>Дата изменения</p>
                        </div>
                    </div>
                </div>
                @foreach($teachers->sortBy('surname') as $teacher)
                    <div class="teacher-items">
                        <div class="items">
                            <div class="item">
                                <p>{{ $teacher->id }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $teacher->surname }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $teacher->name }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $teacher->patronymic }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $teacher->created_at }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $teacher->updated_at }}</p>
                            </div>
                            <div class="item">
                                <div class="admin-tools">
                                    @if(auth()->check() && auth()->user()->is_admin)
                                        <form
                                            action="{{ route('teacher.destroy', $teacher) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                <i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('teacher.edit', $teacher) }}"
                                              method="get">
                                            <button type="submit"><i class="fa-solid fa-pen"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
