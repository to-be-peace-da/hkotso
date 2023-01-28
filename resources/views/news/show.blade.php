<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Все новости</h1>
                </a>
            </div>
            <div class="single-news">
                <div class="content">
                    <div class="img"
                         style="background: url({{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }})">
                    </div>
                    <div class="title">
                        <h2>{{ $singleNews->name }}</h2>
                    </div>
                    <div class="text">
                        <p>{!! nl2br($singleNews->text) !!}</p>
                    </div>
                    <div class="release-date">
                        <h3>{{ $singleNews->created_at }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
