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
                                     style="background: url('https://www.harvard.edu/wp-content/uploads/2023/01/042822_Arts_Medalist_396-768x576.jpg')">
                                </div>
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h2>{{ Str::of($singleNews->name)->limit(70) }}</h2>
                                </div>
                                <div class="text">
                                    <p>{{ nl2br(Str::of($singleNews->text)->limit(100)) }}</p>
                                </div>
                                <div class="release-date">
                                    <h3>{{ $singleNews->created_at->format('d.m.Y h:m') }}</h3>
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
    <div class="odd">
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
                                    <h2>{{ Str::of($advertisement->name)->limit(70) }}</h2>
                                </div>
                                <div class="release-date">
                                    <h3>{{ $advertisement->created_at->format('d.m.Y h:m') }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="more">
                    <a href="{{ route('advertisement.index') }}">
                        <h2>Показать еще</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
