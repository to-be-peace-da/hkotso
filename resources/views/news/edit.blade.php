<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Все новости</h1>
                </a>
            </div>
            <div class="single-news-edit">
                <div class="content">
                    <form action="{{ route('news.update', $singleNews) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="img-wrapper">
                            <div class="img"
                                 style="background: url({{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }})">
                            </div>
                            <div class="label-and-input">
                                <label for="news_image">Изображение</label>
                                <input type="file" name="image" id="news_image" value="{{ $singleNews->image }}">
                                @error('image')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="name">
                            <label for="news_name">Имя</label>
                            <input type="text" name="name" id="news_name" value="{{ $singleNews->name }}">
                            @error('name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text">
                            <label for="news_text">Текст</label>
                            <textarea name="text" id="news_text">{{ $singleNews->text }}</textarea>
                            @error('text')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="release-date">
                            <h3>{{ $singleNews->created_at->format('d.m.Y h:m') }}</h3>
                        </div>
                        <button type="submit">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
