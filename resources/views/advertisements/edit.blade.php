<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('advertisement.index') }}">
                    <h1>Все объявления</h1>
                </a>
            </div>
            <div class="single-news-edit">
                <div class="content">
                    <form action="{{ route('advertisement.update', $advertisement) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="name">
                            <label for="news_name">Имя</label>
                            <input type="text" name="name" id="news_name" value="{{ $advertisement->name }}">
                            @error('name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text">
                            <label for="news_text">Текст</label>
                            <textarea name="text" id="news_text">{{ $advertisement->text }}</textarea>
                            @error('text')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="release-date">
                            <h3>{{ $advertisement->created_at->format('d.m.Y h:m') }}</h3>
                        </div>
                        <button type="submit">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
