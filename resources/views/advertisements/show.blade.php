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
                </div>
            </div>
        </div>
    </div>
</x-layout>
