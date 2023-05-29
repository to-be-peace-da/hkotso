<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Последние новости</h1>
                </a>
            </div>
            <div class="latest-news">
                @foreach($news as $singleNews)
                    <a href="{{ route('news.show', $singleNews) }}">
                        <div class="card">
                            <div class="img-wrapper">
                                <div class="img"
                                     style="background: url({{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }})">
                                </div>
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h2>{{ Str::of($singleNews->name)->limit(60) }}</h2>
                                </div>
                                <div class="text">
                                    <p>{{ strip_tags(Str::of($singleNews->text)->limit(100)) }}</p>
                                </div>
                                <div class="release-date">
                                    <h3>{{ $singleNews->created_at->format('d.m.Y h:m') }}</h3>
                                    <div class="admin-tools">
                                        @if(auth()->check() && auth()->user()->is_admin)
                                            <form action="{{ route('news.destroy', $singleNews) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Вы уверены, что хотите удалить это?')">
                                                    <i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <form action="{{ route('news.edit', $singleNews) }}" method="get">
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
            <div class="more">
                <a href="{{ route('news.index') }}">
                    <h2>Читать больше</h2>
                </a>
            </div>
        </div>
    </div>
    {{--    <div class="odd">--}}
    {{--        <div class="container">--}}
    {{--            <div class="block-title">--}}
    {{--                <a href="{{ route('advertisement.index') }}">--}}
    {{--                    <h1>Объявления</h1>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="advertisements">--}}
    {{--                @foreach($advertisements as $advertisement)--}}
    {{--                    <a href="{{ route('advertisement.show', $advertisement) }}">--}}
    {{--                        <div class="listing">--}}
    {{--                            <div class="arrow">--}}
    {{--                                <img src="{{ asset('/storage/images/arrow.svg') }}" alt="">--}}
    {{--                            </div>--}}
    {{--                            <div class="content">--}}
    {{--                                <div class="title">--}}
    {{--                                    <h2>{{ Str::of($advertisement->name)->limit(200) }}</h2>--}}
    {{--                                </div>--}}
    {{--                                <div class="release-date">--}}
    {{--                                    <h3>{{ $advertisement->created_at->format('d.m.Y h:m') }}</h3>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="admin-tools">--}}
    {{--                                @if(auth()->check() && auth()->user()->is_admin)--}}
    {{--                                    <form action="{{ route('advertisement.destroy', $advertisement) }}" method="post">--}}
    {{--                                        @csrf--}}
    {{--                                        @method('DELETE')--}}
    {{--                                        <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить это?')"><i class="fa-solid fa-trash"></i></button>--}}
    {{--                                    </form>--}}
    {{--                                    <form action="{{ route('advertisement.edit', $advertisement) }}" method="get">--}}
    {{--                                        <button type="submit"><i class="fa-solid fa-pen"></i></button>--}}
    {{--                                    </form>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                @endforeach--}}
    {{--                <div class="more">--}}
    {{--                    <a href="{{ route('advertisement.index') }}">--}}
    {{--                        <h2>Показать еще</h2>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-layout>
