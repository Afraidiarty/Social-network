@extends('inc.layout')

@section('title')
    Главная
@endsection

@section('content')
            <main>
                <div class="content">
                        <div class="block-info">
                            <h1>Общайтесь   <br>
                                где и когда <br>
                                угодно</h1>
                                <span class="info-mess" >С помощью Messenger вы можете легко общаться с близкими <br> людьми.</span>
                        </div>

                    <div class="reg">
                        <div class="block-reg">
                            <span class="title-reg">Добро пожаловать</span>
                            <form action="{{ route('reg-form')}}" method="post" class="login-form">
                                @csrf
                                <input type="text" name="login" placeholder="Введите Логин" required>
                                <input type="text" name="email" placeholder="Введите Email" required>
                                <input type="password" name="password" placeholder="Введите пароль" required>
                                <br><br>
                                <a href="/login" class="forgot" style="color: #848fa3;   font-family: Qanelas-Soft,sans-serif;" >Есть аккаунт?</a>
                                <br><br>
                                <input type="submit" value="Зарегестрироваться">
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            
            <message>
                @include('inc.messages')
            </message>
@endsection
