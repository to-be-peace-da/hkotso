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
                                     style="background: url('https://www.harvard.edu/wp-content/uploads/2023/01/042822_Arts_Medalist_396-768x576.jpg')">
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
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
