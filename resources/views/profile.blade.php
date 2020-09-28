@extends('layouts.app')
@section('title')Профиль@endsection
@section('content')
    <div class="align-self-baseline container my-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                <div class="h2 text-black-50 my-5">
                    Профиль пользователя
                    {{ $name }}
                </div>
                @if($userId == $sessionUserId)
                    <a class="my-2 mx-4 d-flex" href="/exit"><button class="btn btn-dark flex-grow-1">Выйти</button></a>
                    <a class="my-2 mx-4 d-flex" href="/library"><button class="btn btn-dark flex-grow-1">Библиотека</button></a>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger mt-2 mx-4 text-left">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($sessionUserId)
                    <div class="px-4 pt-4">
                        <form action="{{ route('createComment') }}" method="POST">
                            @csrf
                            <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                            <input name="title" type="text" class="form-control mb-2"
                                   placeholder="Заголовок комментария">
                            <textarea name="message" class="form-control mb-2"
                                      placeholder="Текст комментария"></textarea>
                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">Отправить</button>
                        </form>
                    </div>
                @endif
                <div id="comments">
                    @if($comments ?? '')
                        @foreach($comments as $message)
                            @if($userId == $sessionUserId)
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5">{{ $message->title }}</span>
                                        <span class="text-black-50">{{ $message->user_id }}</span>
                                    </p>
                                    <div class="align-self-start">{{ $message->message }}</div>
                                    <br>
                                    <div>
                                        <form action="{{ route('deleteComment') }}" method="POST"
                                              class="text-left">
                                            @csrf
                                            <input type="number" class="d-none" name="commentId"
                                                   id="task{{ $message->id }}"
                                                   value="{{ $message->id }}">
                                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                            </button>
                                        </form>
                                        @foreach($responses as $response)
                                            @if($response->message_id == $message->id)
                                                <div class="card-footer d-flex flex-column">
                                                    <p class="d-flex justify-content-between">
                                                        <span class="h5">{{ $response->title }}</span>
                                                        <span class="text-black-50">{{ $response->user_id }}</span>
                                                    </p>
                                                    <div class="align-self-start">{{ $response->message }}</div>
                                                    <br>
                                                    <form action="{{ route('deleteComment') }}" method="POST"
                                                          class="text-left">
                                                        @csrf
                                                        <input type="number" class="d-none" name="commentId"
                                                               id="task{{ $response->id }}"
                                                               value="{{ $response->id }}">
                                                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endforeach
                                        <form action="{{ route('createComment') }}" method="POST" class="mt-4">
                                            @csrf
                                            <input type="number" class="d-none" name="commentId"
                                                   id="task{{ $message->id }}"
                                                   value="{{ $message->id }}">
                                            <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                                            <input name="title" type="text" class="form-control mb-2"
                                                   placeholder="Заголовок комментария">
                                            <textarea name="message" class="form-control mb-2"
                                                      placeholder="Текст комментария"></textarea>
                                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                                                Ответить
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @elseif($message->user_id == $sessionUserId && $sessionUserId)
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5">{{ $message->title }}</span>
                                        <span class="text-black-50">{{ $message->user_id }}</span>
                                    </p>
                                    <div class="align-self-start">{{ $message->message }}</div>
                                    <br>
                                    <div>
                                        <form action="{{ route('deleteComment') }}" method="POST" id="comments"
                                              class="text-left">
                                            @csrf
                                            <input type="number" class="d-none" name="commentId"
                                                   id="task{{ $message->id }}"
                                                   value="{{ $message->id }}">
                                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                            </button>
                                        </form>
                                        @foreach($responses as $response)
                                            @if($response->message_id == $message->id)
                                                <div class="card-footer d-flex flex-column">
                                                    <p class="d-flex justify-content-between">
                                                        <span class="h5">{{ $response->title }}</span>
                                                        <span class="text-black-50">{{ $response->user_id }}</span>
                                                    </p>
                                                    <div class="align-self-start">{{ $response->message }}</div>
                                                    @if($response->user_id == $sessionUserId && $sessionUserId)
                                                        <br>
                                                        <form action="{{ route('deleteComment') }}" method="POST"
                                                              class="text-left">
                                                            @csrf
                                                            <input type="number" class="d-none" name="commentId"
                                                                   id="task{{ $response->id }}"
                                                                   value="{{ $response->id }}">
                                                            <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        <form action="{{ route('createComment') }}" method="POST" class="mt-4">
                                            @csrf
                                            <input type="number" class="d-none" name="commentId"
                                                   id="task{{ $message->id }}"
                                                   value="{{ $message->id }}">
                                            <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                                            <input name="title" type="text" class="form-control mb-2"
                                                   placeholder="Заголовок комментария">
                                            <textarea name="message" class="form-control mb-2"
                                                      placeholder="Текст комментария"></textarea>
                                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                                                Ответить
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @else
                                <div class="card-footer d-flex flex-column">
                                    <p class="d-flex justify-content-between">
                                        <span class="h5">{{ $message->title }}</span>
                                        <span class="text-black-50">{{ $message->user_id }}</span>
                                    </p>
                                    <div class="align-self-start">{{ $message->message }}</div>
                                    <br>
                                    @foreach($responses as $response)
                                        @if($response->message_id == $message->id)
                                            <div class="card-footer d-flex flex-column">
                                                <p class="d-flex justify-content-between">
                                                    <span class="h5">{{ $response->title }}</span>
                                                    <span class="text-black-50">{{ $response->user_id }}</span>
                                                </p>
                                                <div class="align-self-start">{{ $response->message }}</div>
                                                @if($response->user_id == $sessionUserId && $sessionUserId)
                                                    <br>
                                                    <form action="{{ route('deleteComment') }}" method="POST"
                                                          class="text-left">
                                                        @csrf
                                                        <input type="number" class="d-none" name="commentId"
                                                               id="task{{ $response->id }}"
                                                               value="{{ $response->id }}">
                                                        <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                    @if($sessionUserId)
                                        <form action="{{ route('createComment') }}" method="POST" class="mt-4">
                                            @csrf
                                            <input type="number" class="d-none" name="commentId"
                                                   id="task{{ $message->id }}"
                                                   value="{{ $message->id }}">
                                            <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                                            <input name="title" type="text" class="form-control mb-2"
                                                   placeholder="Заголовок комментария">
                                            <textarea name="message" class="form-control mb-2"
                                                      placeholder="Текст комментария"></textarea>
                                            <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                                                Ответить
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                    <button type="button" id="loadComments" data-loading-text="Loading..." class="btn btn-outline-info m-4"
                            onclick="getMessage()">Все комментарии...
                    </button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function getMessage() {
            var data = {};
            data['userId'] = <?php echo $userId ?>;
            data['_token'] = $('meta[name="csrf-token"]').attr('content');
            data['flag'] = false;
            $.ajax({
                type: 'POST',
                url: '/ajax/comments',
                data: data,
                beforeSend: function() {
                    $('#loadComments').replaceWith('');
                },
                success: function (data) {
                    $('#comments').append(data);
                },
                error: function (result) {
                    console.log(result);
                }
            });
        };
    </script>
@endsection
