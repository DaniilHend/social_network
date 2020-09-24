@extends('layouts.app')
@section('title')Профиль@endsection
@section('content')
    <div class="align-self-baseline container mt-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <div class="h2 text-black-50 my-5">
                    Профиль пользователя
                    {{ $name }}
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mt-2">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="px-4 pt-4">
                    <form action="{{ route('createComment') }}" method="POST">
                        @csrf
                        <input name="title" type="text" class="form-control mb-2" placeholder="Заголовок комментария">
                        <textarea name="message" class="form-control mb-2" placeholder="Текст комментария"></textarea>
                        <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                    </form>
                </div>
                <form action="{{ route('deleteComment') }}" method="POST">
                    @csrf
                    <div class="px-4 pb-4">
                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить</button>
                    </div>
                    @if($comments ?? '')
                        @foreach($comments->all() as $message)
                            <div class="card-footer">
                                <h5>{{ $message->title }}</h5>
                                {{ $message->message }}
                                <br>
                                <input type="checkbox" name="task_id[]" id="task{{ $message->id }}"
                                       value="{{ $message->id }}">
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
