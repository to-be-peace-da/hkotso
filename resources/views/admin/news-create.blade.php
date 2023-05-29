<x-layout>
    <div class="even">
        <div class="container">
            <div class="news-create">
                <h2>Создание новости</h2>
                <form class="form-fields" action="{{ route('news.store') }}" method="post"
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
                    <div class="img">
                        <label class="" for="news_image">Обложка</label>
                        <input name="image" type="file" class="" id="news_image">
                    </div>
                    @error('image')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="news_text" class="">Текст</label>
                        <textarea name="text" id="news_text">{{ old('text') }}</textarea>
                    </div>
                    @error('text')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="create">Создать</button>
                </form>
            </div>
        </div>
    </div>
    {{--    <script>--}}
    {{--        $('#news_text').summernote({--}}
    {{--            tabsize: 2,--}}
    {{--            height: 500,--}}
    {{--            toolbar: [--}}
    {{--                ['style', ['style']],--}}
    {{--                ['font', ['bold', 'underline', 'clear']],--}}
    {{--                ['color', ['color']],--}}
    {{--                ['para', ['ul', 'ol', 'paragraph']],--}}
    {{--                // ['table', ['table']],--}}
    {{--                ['insert', ['link', 'video']],--}}
    {{--                ['view', ['fullscreen', 'codeview', 'help']]--}}
    {{--            ]--}}
    {{--        });--}}
    {{--    </script>--}}
</x-layout>
