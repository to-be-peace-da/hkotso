<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h2>Добавление предмета</h2>
                <form class="form-fields" action="{{ route('subject.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input autofocus autocomplete="off" type="text" name="name" id="name"
                               placeholder="Разработка дизайна веб-приложений">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
    <div class="subject-action">
        <div class="odd">
            <div class="container">
                <div class="subject-head">
                    <div class="items">
                        <div class="item">
                            <p>ID</p>
                        </div>
                        <div class="item">
                            <p>Наименование</p>
                        </div>
                        <div class="item">
                            <p>Дата создания</p>
                        </div>
                        <div class="item">
                            <p>Дата изменения</p>
                        </div>
                    </div>
                </div>
                @foreach($subjects->sortBy('name') as $subject)
                    <div class="subject-items">
                        <div class="items">
                            <div class="item">
                                <p>{{ $subject->id }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $subject->name }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $subject->created_at }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $subject->updated_at }}</p>
                            </div>
                            <div class="item">
                                <div class="admin-tools">
                                    @if(auth()->check() && auth()->user()->is_admin)
                                        <form
                                            action="{{ route('subject.destroy', $subject) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                <i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('subject.edit', $subject) }}"
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
