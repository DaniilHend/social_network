@extends('layouts.app')
@section('title') Профиль @endsection
@section('content')
    <div class="align-self-baseline container mt-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0" id="content">
                <div class="h2 text-black-50 my-5">
                    Мои книги
                </div>
                <div class="px-4 pt-4">
                    <form action="{{ route('createBook') }}" method="POST">
                        @csrf
                        <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                        <input name="title" type="text" class="form-control mb-2"
                               placeholder="Заголовок книги">
                        <textarea name="text" class="form-control mb-2"
                                  placeholder="Текст книги"></textarea>
                        <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                    </form>
                </div>
                @if($books ?? '')
                    @foreach($books->all() as $book)
                        <div class="card-footer d-flex flex-column">
                            <p class="d-flex justify-content-between">
                                <span class="h5">{{ $book->title }}</span>
                                <p class="text-left">{{ $book->text }}</p>
                                <span class="text-black-50">{{ $book->user_id }}</span>
                            </p>
                            <div>
                                <form action="{{ route('deleteBook') }}" method="POST"
                                      class="text-left">
                                    @csrf
                                    <input type="number" class="d-none" name="bookId"
                                           id="book{{ $book->id }}"
                                           value="{{ $book->id }}">
                                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                    </button>
                                </form>
                                <a class="d-flex mt-2" href="/book/{{ $book->id }}">
                                    <button class="btn btn-primary flex-grow-1">Читать</button>
                                </a>
                                <a class="d-flex mt-2" href="/book/edit/{{ $book->id }}">
                                    <button class="btn btn-primary flex-grow-1">Редактировать</button>
                                </a>
                                <a class="d-flex mt-2" href="/book/share/{{ $book->id }}">
                                    <button class="btn btn-primary flex-grow-1">Поделиться</button>
                                </a>
                                @if($book->token)
                                    <input class="form-control" type="text" value="/book/{{ $book->token }}">
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="mt-5 popover">
        <button type="button" id="loadComments" data-loading-text="Loading..." class="btn btn-outline-info m-4"
                onclick="getLibrary()">Доступные библиотеки
        </button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        var data = {};
        data['count'] = 1;
        data['userId'] = <?php echo $userId ?>;
        data['_token'] = $('meta[name="csrf-token"]').attr('content');
        function getLibrary() {
            $.ajax({
                type: 'POST',
                url: '/ajax/library',
                data: data,
                beforeSend: function() {
                    data['count'] += 1;
                    console.log(data['count']);
                },
                success: function (data) {
                    if (data['count'] % 2 == 1) {

                    }
                    $('#content').html(data);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        };
    </script>
@endsection
