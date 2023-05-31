<x-layout>
    <div class="even">
        <div class="container">
            <div class="block-title">
                <a href="{{ route('news.index') }}">
                    <h1>Все новости</h1>
                </a>
            </div>
            <div class="single-news uniq-wrapper">
                <div class="content uniq-fields">
                    <div class="img"
                         style="background: url({{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }})"
                         onclick="openModal('{{ $singleNews->image ? asset('storage/' . $singleNews->image) : asset('storage/news_images/default.jpg') }}')">
                    </div>
                    <div class="title">
                        <h2>{{ $singleNews->name }}</h2>
                    </div>
                    <div class="text">
                        <p>{!! nl2br($singleNews->text) !!}</p>
                    </div>
                    <div class="release-date">
                        <h3>{{ $singleNews->created_at->format('d.m.Y h:m') }}</h3>
                    </div>
                    <div class="admin-tools">
                        @if(auth()->check() && auth()->user()->is_admin)
                            <form action="{{ route('news.destroy', $singleNews) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить это?')"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                            <form action="{{ route('news.edit', $singleNews) }}" method="get">
                                <button type="submit"><i class="fa-solid fa-pen"></i></button>
                            </form>
                        @endif
                    </div>
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

    <script>
        let modal = document.querySelector('#modal');
        let modalImage = document.querySelector('#modal-image');

        function openModal(imageUrl) {
            modal.style.display = "flex";
            modalImage.src = imageUrl;
        }

        function closeModal() {
            modal.style.display = "none";
        }

        window.addEventListener("click", function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</x-layout>
