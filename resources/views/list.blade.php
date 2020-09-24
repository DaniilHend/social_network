@extends('layouts.app')
@section('title')Профиль@endsection
@section('content')
    <div class="align-self-baseline container mt-5">
        <div class="row">
            <div class="card col d-flex flex-column px-0">
                @if($profiles ?? '')
                    <div class="h2 text-black-50 my-5">
                        Все профили
                    </div>
                    @foreach($profiles->all() as $profile)
                        <a href="/profile/{{ $profile->id }}">
                            <div class="card-footer">
                                <h5>{{ $profile->login }}</h5>
                            </div>
                        </a>
                    @endforeach
                @endif
                @if($comments ?? '')
                    <div class="h2 text-black-50 my-5">
                        Ваши комментарии
                    </div>
                    @foreach($comments->all() as $comment)
                        <a href="/profile/{{ $comment->profile_id }}">
                            <div class="card-footer">
                                <h5>{{ $comment->title }}</h5>
                                {{ $comment->message }}
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
@endsection
