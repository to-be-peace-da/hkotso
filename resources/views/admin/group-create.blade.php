<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper groups-create">
                <h2>Группы</h2>
                <form class="form-fields" action="{{ route('group.store') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="name" class="">Наименование</label>
                        <input autofocus autocomplete="off" type="text" name="name" id="name" placeholder="ИС-41">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
    <div class="groups-action">
        <div class="odd">
            <div class="container">
                <div class="group-head">
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
                @foreach($groups->sortBy('name') as $group)
                    <div class="group-items">
                        <div class="items">
                            <div class="item">
                                <p>{{ $group->id }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $group->name }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $group->created_at }}</p>
                            </div>
                            <div class="item">
                                <p>{{ $group->updated_at }}</p>
                            </div>
                            <div class="item">
                                <div class="admin-tools">
                                    @if(auth()->check() && auth()->user()->is_admin)
                                        <form
                                            action="{{ route('group.destroy', $group) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                <i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('group.edit', $group) }}"
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
