@extends('layouts.app')
@section('title') Профиль @endsection
@section('content')
    <div class="align-self-baseline container my-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                @if($edit == false)
                    <div class="h2 text-black-50 my-5">
                        {{ $book->title }}
                    </div>
                    <div id="book">
                        <p>{{ $book->text }}</p>
                    </div>
                @else
                    <form action="{{ route('updateBook') }}" method="POST" class="mx-4">
                        <div class="h2 text-black-50 my-5">
                            <p>Редактирование</p>
                            @csrf
                            <input name="bookId" type="number" class="d-none" value="{{ $book->id }}">
                            <input name="title" type="text" class="form-control mb-2"
                                   placeholder="Заголовок книги" value="{{ $book->title }}">
                        </div>
                        <div id="book">
                            <textarea name="text" class="form-control mb-2"
                                      placeholder="Текст книги">{{ $book->text }}</textarea>
                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
