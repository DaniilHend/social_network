@extends('layouts.app')
@section('title')Вход/Регистрация@endsection
@section('content')
<form class="form-signin" action="{{ route('sign') }}" method="POST">
    @csrf

    <h1 class="h3 mb-3 font-weight-normal">Please sign in/up</h1>
    <label for="inputEmail" class="sr-only">Login</label>
    <input name="login" type="text" id="inputLogin" class="form-control" placeholder="Login">
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="password" class="form-control" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in/up</button>
    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
