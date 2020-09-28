<div class="h2 text-black-50 my-5">
    @if($mine == true)
        Мои книги
    @else
        Доступные мне
    @endif
</div>
<div class="px-4 pt-4">
    @if($mine == true)
        <form action="{{ route('createBook') }}" method="POST">
            @csrf
            <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
            <input name="title" type="text" class="form-control mb-2"
                   placeholder="Заголовок книги">
            <textarea name="text" class="form-control mb-2"
                      placeholder="Текст книги"></textarea>
            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
        </form>
    @endif
</div>
@if($books ?? '')
    @foreach($books as $book)
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $book->title }}</span>
                <p class="text-left">{{ $book->text }}</p>
                <span class="text-black-50">{{ $book->user_id }}</span>
            </p>
            <div>
                @if($mine == true)
                <form action="{{ route('deleteBook') }}" method="POST"
                      class="text-left">
                    @csrf
                    <input type="number" class="d-none" name="bookId"
                           id="book{{ $book->id }}"
                           value="{{ $book->id }}">
                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                    </button>
                </form>
                @endif
                <a class="d-flex mt-2" href="/book/{{ $book->id }}">
                    <button class="btn btn-primary flex-grow-1">Читать</button>
                </a>
                @if($mine == true)
                <a class="d-flex mt-2" href="/book/edit/{{ $book->id }}">
                    <button class="btn btn-primary flex-grow-1">Редактировать</button>
                </a>
                <a class="d-flex mt-2" href="/book/share/{{ $book->id }}">
                    <button class="btn btn-primary flex-grow-1">Поделиться</button>
                </a>
                @if($book->token)
                    <input class="form-control" type="text" value="/book/{{ $book->token }}">
                @endif
                @endif
            </div>
        </div>
    @endforeach
@endif
