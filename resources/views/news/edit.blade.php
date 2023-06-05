<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Все новости</h1>
                </a>
            </div>
            <div class="single-news-edit">
                <div class="content uniq-wrapper">
                    <form class="uniq-fields" action="{{ route('news.update', $singleNews) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="img-wrapper">
                            <div class="img"
                                 style="background: url({{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }})"
                                 onclick="openModal('{{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }}')"
                            >
                            </div>
                            <div class="label-and-input">
                                <label for="news_image">Обложка</label>
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
                        <button type="submit" class="edit">Изменить</button>
                        {{--                        <button id="add_link" type="button" class="">Добавить ссылку</button>--}}
                        {{--                        <button id="bold_selected_text" type="button" class="">B</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img id="modal-image" src="" alt="modal">
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
