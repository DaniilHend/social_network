@extends('layouts.app')
@section('title')Профиль@endsection
@section('sidebar')

@endsection
@section('content')
    <div class="align-self-baseline container my-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <div class="h2 text-black-50 my-5">
                    Профиль пользователя
                    {{ $name }}
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mt-2 mx-4 text-left">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(@login == true)
                    <div class="px-4 pt-4">
                        <form action="{{ route('createComment') }}" method="POST">
                            @csrf
                            <input name="title" type="text" class="form-control mb-2"
                                   placeholder="Заголовок комментария">
                            <textarea name="message" class="form-control mb-2"
                                      placeholder="Текст комментария"></textarea>
                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                        </form>
                    </div>
                @endif
                <form action="{{ route('deleteComment') }}" method="POST">
                    @if(@login == true)
                        @csrf
                        <div class="px-4 pb-4">
                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить</button>
                        </div>
                    @endif
                    @if($comments ?? '')
                        @foreach($comments->all() as $message)
                            <div class="card-footer d-flex flex-column">
                                <p class="d-flex justify-content-between"><span class="h5">{{ $message->title }}</span>
                                    <span class="text-black-50">{{ $message->user_id }}</span></p>
                                <div class="align-self-start">{{ $message->message }}</div>
                                @if($message->user_id)
                                    @endif
                                <br>
                                <input type="checkbox" name="commentId[]" id="task{{ $message->id }}"
                                       value="{{ $message->id }}">
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
