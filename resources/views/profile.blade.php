 @extends('layouts.app')
 @section('title')Профиль@endsection
 @section('content')
        <div class="align-self-baseline container">
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
                    <div class="p-4">
                        <form action="{{ route('comment') }}" method="POST">
                            @csrf
                            <input name="title" type="text" class="form-control mb-2" placeholder="Заголовок комментария">
                            <textarea name="message" class="form-control mb-2" placeholder="Текст комментария"></textarea>
                            <button class="btn btn-primary btn-block" type="submit">Отправить</button>
                        </form>
                    </div>
                    @if($comments ?? '')
                        @foreach($comments->all() as $message)
                        <div class="card-footer">
                            <h6>{{ $message->title }}</h6>
                            {{ $message->message }}
                        </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
 @endsection
