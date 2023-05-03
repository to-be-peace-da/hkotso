<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('advertisement.index') }}">
                    <h1>Все объявления</h1>
                </a>
            </div>
            <div class="single-news">
                <div class="content">
                    <div class="title">
                        <h2>{{ $advertisement->name }}</h2>
                    </div>
                    <div class="text">
                        <p>{!! nl2br($advertisement->text) !!}</p>
                    </div>
                    <div class="release-date">
                        <h3>{{ $advertisement->created_at }}</h3>
                    </div>
                    <div class="admin-tools">
                        @if(auth()->check() && auth()->user()->is_admin)
                            <form action="{{ route('advertisement.destroy', $advertisement) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить это?')"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                            <form action="{{ route('advertisement.edit', $advertisement) }}" method="get">
                                <button type="submit"><i class="fa-solid fa-pen"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
