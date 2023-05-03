<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('advertisement.index') }}">
                    <h1>Объявления</h1>
                </a>
            </div>
            <div class="advertisements">
                @foreach($advertisements as $advertisement)
                    <a href="{{ route('advertisement.show', $advertisement) }}">
                        <div class="listing">
                            <div class="arrow">
                                <img src="{{ asset('/storage/images/arrow.svg') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h2>{{ Str::of($advertisement->name)->limit(200) }}</h2>
                                </div>
                                <div class="release-date">
                                    <h3>{{ $advertisement->created_at->format('d.m.Y h:m') }}</h3>
                                    <div class="admin-tools">
                                        @if(auth()->check() && auth()->user()->is_admin)
                                            <form action="{{ route('advertisement.destroy', $advertisement) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                    <i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <form action="{{ route('advertisement.edit', $advertisement) }}"
                                                  method="get">
                                                <button type="submit"><i class="fa-solid fa-pen"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="odd">
        <div class="container">
            <div>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
</x-layout>
