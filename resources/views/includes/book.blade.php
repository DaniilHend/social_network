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
