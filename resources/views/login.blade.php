@extends('inc.layout')

@section('title')
    Авторизация
@endsection

@section('content')
    <div class="content-login">
        <span class="title-reg">Авторизация</span>
        <form action="{{ route('log-form')}}" method="post" class="login-form">
            @csrf
            <input type="text" name="name" placeholder="Введите Логин">
            <input type="password" name="password" placeholder="Введите пароль">
            <br><br>
            <a href="/forgot-password" class="forgot" style="color: #848fa3;   font-family: Qanelas-Soft,sans-serif;" >Забыли пароль?</a>
            <br><br>
            <input type="submit" value="Войти">
        </form>

        <message>
            @include('inc.messages')
        </message>

        @if(isset($user_info))
    <div> 
        @foreach($user_info as $key => $value)
            <p>{{ $key }}: {{ $value }}</p>
        @endforeach
    </div>
@endif
        
    </div>
@endsection
