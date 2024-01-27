@extends('inc.layout')

@section('title')
    Inbox
@endsection

@section('content')
    <div class="tophive-grid">
        <main class="main-inbox" >
            <div class="container-inner height">
                <div class="entry-container">
                    <div class="tophive-bp-messenger-main-wrapper">
                        <div class="th-messenger-chat-list">
                            <div class="th-bpm-top">
                                <form><input class="search_chat_members" type="search" placeholder="Search member..."></form>

                                {{-- 1 СООБЩЕНИЕ --}}
                                @foreach ($users_show_messages as $user)
                                <div class="th-bpm-chat-members">
                                    <div class="chat-with-person" onclick="loadMessages({{ $user->id }})">
                                            <div class="chat-with-person-flex">
                                                <div class="photo-profle">
                                                    <img src="{{ asset('/public/storage/' . $user->id_image) }}" alt="">
                                                </div>
                                                <div class="inside">
                                                    <div class="name-group">{{ $user->name }}</div>
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
                                    $.ajax({
                                        url: '/get-messages/' + userId,
                                        type: 'GET',
                                        success: function (response) {
                                            $('#chat-window').empty();
                                            var recepient = '';
                            
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

                                <div class="th-bpm-chat-members">
                                    <div class="chat-with-person">
                                        <div class="chat-with-person-flex">
                                            <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/1/1660981430-bpthumb.jpg" alt=""></div>
                                            <div class="inside">
                                                <div class="name-group">Group</div>
                                                <div class="first-messages">FIRST-MESSAGE</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="textes">
                 <div class="profile-who-message">
                    <div class="chat-with-person-flex">
                        <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/1/1660981430-bpthumb.jpg" alt=""></div>
                        <div class="inside">
                            <div class="name-group">Group</div>
                            <div class="first-messages">FIRST-MESSAGE</div>
                        </div>
                    </div>

                    <div id="chat-window"  style="color: black">
                        <!-- Здесь будет выводиться чат -->
                    </div>



                    <div class="conversion-form">
                        <form id="sendMessageForm" action="{{ route('SendMessages', ['id_user' => ':userd']) }}" method="post">
                            @csrf
                            <input class="input-message" name="messagePrivate" id="messagePrivate" placeholder="Введите сообщение" type="text">
                            <button type="button" onclick="sendMessage()">
                                <span class="material-symbols-outlined ic">
                                    send
                                </span>
                            </button>
                        </form>
                        <script>
                            function sendMessage() {
                                var message = document.getElementById('messagePrivate').value;

                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('SendMessages', ['id_user' => $user->id]) }}',
                                    data: {
                                        '_token': '{{ csrf_token() }}',
                                        'messagePrivate': message
                                    },
                                    success: function (data) {


                                        var messageClass = 'c-right';
                                        $('#chat-window').append(
                                            '<div class="wrapper-textes">' +
                                            '<span class="' + messageClass + '">'+ message +'<span style = "color:white;" class="time">11:15 am</span></span>' +
                                            '</div>'
                                        );
                                    },
                                    error: function (error) {
                                        console.error('Error sending message:', error);
                                    }
                                });
                            }
                        </script>
                            

                    </div>

                 </div>
            </div>
            </div>
            
        </main>
    </div>
@endsection