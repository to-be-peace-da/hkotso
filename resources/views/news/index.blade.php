<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Новости</h1>
                </a>
            </div>
            <div class="news">
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
                                    <h2>{{ Str::of($singleNews->name)->limit(300) }}</h2>
                                </div>
                                <div class="text">
                                    <p>{{ Str::of($singleNews->text)->limit(500) }}</p>
                                </div>
                                <div class="release-date">
                                    <h3>{{ $singleNews->created_at->format('d.m.Y h:m') }}</h3>
                                    <div class="admin-tools">
                                        @if(auth()->check() && auth()->user()->is_admin)
                                            <form action="{{ route('news.destroy', $singleNews) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            <form action="{{ route('news.edit', $singleNews) }}" method="get">
                                                @csrf
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
</x-layout>
