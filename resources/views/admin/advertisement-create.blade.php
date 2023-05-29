<x-layout>
    <div class="even">
        <div class="container">
            <div class="news-create">
                <h2>Создание объявления</h2>
                <form class="form-fields" action="{{ route('advertisements.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="label-and-input">
                        <label for="news_name" class="">Заголовок</label>
                        <input autofocus autocomplete="off" name="name" type="text" class="form-control" id="news_name"
                               value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="news_text" class="">Текст</label>
                        <textarea name="text" id="news_text">{{ old('text') }}</textarea>
                    </div>
                    @error('text')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Создать</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
