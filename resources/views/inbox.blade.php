<style>
    body {
    margin: 0;
    /* background: linear-gradient(to right, #30415f, #456990);*/
    color: white;
    padding: 35px 140px;
    overflow-y: hidden;
}

</style>
@extends('inc.layout')

@section('title')
    Inbox
@endsection

@section('content')
    <div class="tophive-grid">
        <main class="main-inbox" >
            <div class="container-inner height">
                <div class="entry-container" style="border-right: 1px solid #404040">
                    <div class="tophive-bp-messenger-main-wrapper">
                        <div class="th-messenger-chat-list">
                            <div class="th-bpm-top">

                                <div class="top-block">
                                    <div class="drope-menu-in-inbox">
                                        <span id="menu-btn" style="cursor: pointer;" class="material-symbols-outlined">
                                            menu
                                        </span>
                                        <div id="dropdown-menu" class="dropdown-content">
                                            <a href="{{ route('members') }}" class="load-page" data-url="{{ route('members') }}"><span class="material-symbols-outlined">person</span>Активные профили</a>
                                            <a href="#" class="load-page-inbox" data-url="#"><span class="material-symbols-outlined">message</span>Личные сообщения</a>
                                            <a href="{{ route('settings') }}" class="load-page" data-url="{{ route('settings') }}"><span class="material-symbols-outlined">settings</span>Настройки</a>
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                $('.load-page-inbox').on('click',function(e){
                                                    e.preventDefault();
                                                    $('.textes').show();
                                                    $('.textess').html('');
                                                })
                                            })

                                            $(document).ready(function() {

                                                $('.load-page').on('click', function(e) {
                                                    e.preventDefault();
                                        
                                                    var url = $(this).data('url');
                                                    
                                                    $('.textes').hide();

                                                    $.ajax({
                                                        url: url,
                                                        method: 'GET',
                                                        success: function(response) {
                                                            $('.textess').html(response);
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error(error);
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                    <form><input class="search_chat_members" type="search" placeholder="Search member..."></form>
                                </div>
                                <script>
                                    document.addEventListener('click', function(event) {
                                        var dropdownMenu = document.getElementById('dropdown-menu');
                                        var menuBtn = document.getElementById('menu-btn');
                                        if (!menuBtn.contains(event.target)) {
                                            dropdownMenu.style.display = 'none';
                                        }
                                    });

                                    $(document).ready(function(){
                                        $('#menu-btn').click(function(){
                                            $('#dropdown-menu').slideToggle('fast');
                                        });
                                    });
                                    </script>                                
                                @php
                                    use App\Models\PrivateMessages;

                                    $isChatsExist = PrivateMessages::where(function($query) use ($user_me) {
                                        $query->where('sender_id', $user_me['id'])
                                            ->orWhere('receiver_id', $user_me['id']);
                                    })->exists();
                                @endphp

                                @if(!$isChatsExist)
                                    <div class="notexist">
                                        <span class="material-symbols-outlined">mail</span>
                                        <h3>У вас нету сообщений</h3>
                                    </div>
                                @endif

                                {{-- 1 СООБЩЕНИЕ --}}
                                @foreach ($users_show_messages as $user)
                                <div class="th-bpm-chat-members">
                                    <div class="chat-with-person" onclick="loadMessages({{ $user->id }})">
                                            <div class="chat-with-person-flex">
                                                <div class="photo-profle-slipe">
                                                    <img src="{{ asset('/public/storage/' . $user->id_image) }}" alt="">
                                                </div>
                                                <div class="inside">
                                                    <div class="name-group-slipe">{{ $user->name }}</div>
                                                    <div class="first-messages">
                                                        @if (isset($last_messages[$user->id]))
                                                            {{ $last_messages[$user->id]->message }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                            
                            <script>
                                function loadMessages(userId) {

                                    $('.textess').html('');
                                    $('.textes').show();
                                    $.ajax({
                                        url: '/get-messages/' + userId,
                                        type: 'GET',
                                        success: function (response) {
                                            $('#chat-window').empty();
                                            $('.name-group').empty();
                                            $('.photo-profle').empty();
                                            var recepient = '';
                                            
                                            $('.profile-who-message').css('display', 'block');
                                            
                                            $('.cont-message').css('display', 'none');

                                            $('.textes').css('overflow-y', 'scroll');

                                            $('.btn-cont').empty().append(
                                                '<button type="button" onclick="sendMessage(' + userId + ')">' +
                                                '<span class="material-symbols-outlined ic">arrow_upward</span>' +
                                                '</button>'
                                            );

                                            $('.name-group').text(response.other_user.name);
                                            $('.photo-profle').html('<img src="http://mess/public/storage/' + response.other_user.id_image + '">');

                                            response.messages.forEach(function (message) {
                                                var messageClass = (message.sender_id == {{ $user_me['id'] }}) ? 'c-right' : 'c-left';
                            
                                                if ({{ $user_me['id'] }} == message.sender_id) {
                                                    recepient = message.receiver_id;
                                                    console.log(recepient);
                                                } else {
                                                    recepient = message.sender_id;
                                                }
                            
                                                $('#chat-window').append(
                                                    '<div class="wrapper-textes">' +
                                                    '<span class="' + messageClass + '">' + message.message + '<span class="time">11:15 am</span></span>' +
                                                    '</div>'
                                                );

                                                var container = $('.textes');
                                                container.scrollTop(container.prop('scrollHeight'));

                                                console.log(message);
                                            });
                                            
                                            $('#sendMessageForm').attr('action', function(_, attr) {
                                                return attr.replace(':userd', recepient);
                                            });
                                        },
                                        error: function (error) {
                                            console.log(error);
                                        }
                                    });
                                }
                            </script>
                            
                                {{-- @foreach ($dataMessages as $item)
                                    <p> {{ $item->message }} </p>
                                @endforeach --}}
                
                                {{-- 2 СООБЩЕНИЕ --}}


                            </div>
                        </div>
                    </div>
                </div>

                <div class="textess">

                </div>

                <div class="textes" style="overflow-y: hidden;">
                 <div class="profile-who-message" style="display: none">
                    <div class="chat-with-person-flex fixed">
                        <div class="photo-profle"></div>
                        <div class="inside">
                            <div class="name-group"></div>
                            <div class="first-messages">Получатель</div>
                        </div>
                    </div>

                    <div id="chat-window"  style="color: black">

                    </div>



                    <div class="conversion-form">
                        <form id="sendMessageForm" action="{{ route('SendMessages', ['id_user' => ':userID']) }}" method="post">
                            @csrf
                            <input class="input-message" name="messagePrivate" id="messagePrivate" placeholder="Введите сообщение" type="text">
                            <div class="btn-cont">

                            </div>
                        </form>
                        
                        <script>
                            function sendMessage(userID) {
                                var message = document.getElementById('messagePrivate').value;
                        
                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('SendMessages', ['id_user' => ' ']) }}' + userID,
                                    data: {
                                        '_token': '{{ csrf_token() }}',
                                        'messagePrivate': message
                                    },
                                    success: function (data) {


                                        var messageClass = 'c-right';
                                        $('#chat-window').append(
                                            '<div class="wrapper-textes">' +
                                            '<span class="' + messageClass + '">' + message + '<span style="color:white;" class="time">11:15 am</span></span>' +
                                            '</div>'
                                        );

                                        
                                        var container = $('.textes');
                                        container.scrollTop(container.prop('scrollHeight'));
                                    },
                                    error: function (error) {
                                        console.error('Error sending message:', error);
                                    }
                                });

                                
                            }
                        </script>
                        
                            

                    </div>

                 </div>

                 <div class="cont-message">
                    <i class="uil uil-message"></i>
                    <div class="mess-cont"><h3>Выберите чат</h3></div>
                </div>

            </div>
            </div>
            
        </main>
    </div>
@endsection