 @extends('layouts.app')
 @section('title')Профиль@endsection
 @section('content')
        <div class="align-self-baseline container">
            <div class="row">
                <div class="col h2 text-black-50">
                    Профиль пользователя
                    {{ $name ?? '' }}
                </div>
            </div>
        </div>
 @endsection
