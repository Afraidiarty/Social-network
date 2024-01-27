@extends('inc.layout')

@section('title')
    Inbox
@endsection

@section('content')
<div class="tophive-grid">
    <main class="main-inbox-small" >
        <div class="container-inner">
            <div class="entry-container">
                <div class="buddypress">
                    <nav class="members-type-navs main-navs bp-navs dir-navs " >
                        <ul class="component-navigation members-nav">
                            <li class="members-all" >
                                <a  class="acitve-members" href="">Active Members</a>
                            </li>
                        </ul>
                        <div class="dir-search members-search bp-search" data-bp-search="members">
                            <form method="get" class="bp-dir-search-form" id="dir-members-search-form" role="search">
                        
                                <label for="dir-members-search" class="bp-screen-reader-text">Search Members...</label>
                        
                                <input id="dir-members-search" name="members_search" type="search" placeholder="Search Members...">    
                                
                                <button type="submit" style="color: #555;" class="material-symbols-outlined">
                                    search
                                </button>
                        
                            </form>
                        </div>
                    </nav>
                </div>
            </div>  
        </div>
        
    </main>
</div>

<div class="cards">


        
    @foreach ($data as $users)
    <div class="user-card">
        <div class="header-user">
            <img src="" alt="">
            <div class="avatar"><img src="{{ asset('/public/storage/' . $users->id_image) }}" alt="Photo">
            </div>
        </div>
        <div class="user-info">
            <a href="{{ route('profile', ['id' => $users->id]) }}"><h2>{{ $users->name }}</h2></a>
            <p>{{$users->role}}</p>
        </div>
        <div class="follower-info">

            <div class="folowers">
                <div class="follower-count">{{$users->Followers}}</div>
                <p style="color: #999" >Followers</p>
            </div>

            <div class="folowwing">
                <div class="follower-count">{{$users->Following}}</div>
                <p style="color:#999" >Following</p>
            </div>
        </div>
        <div class="button-row">
            <a class="button follow-button">+ Following</a>
            <a id="myOpenBtn" style="cursor: pointer" data-modal-id="{{ $users->id }}" class="button-messages"><span class="material-symbols-outlined msg">sms</span></a>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="title-modal">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <span style="color: black" >Send message</span>
                </div>
                <form id="myForm"  action="{{ route('SendMessages', ['id_user' => $users->id]) }}" method="post">
                    @csrf
                    <div contenteditable="true" class="bp-suggestions advanced-th-bp-activity-form" data-placeholder="Hi, {{ $users->name }}?" id="th-bp-whats-new" cols="50" rows="10"></div>
                    <input type="hidden" name="messagePrivate" id="messagePrivate">
                    <div class="send">
                        <input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="Post">
                    </div>
                </form>      
            </div>
        </div>

    </div>
    @endforeach

</div>
  


@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById("myModal");
            var openButtons = document.querySelectorAll(".button-messages");
            var closeBtn = document.querySelector(".close");
    
            openButtons.forEach(function (openBtn) {
                openBtn.addEventListener('click', function () {
                    var userId = openBtn.getAttribute('data-modal-id');
                    document.getElementById('myForm').action = "http://mess/inbox/SendMessages/" + userId;
                    modal.style.display = "block";
                });
            }); 
    
            closeBtn.onclick = function () {
                modal.style.display = "none";
            };
    
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
    
            var divElement = document.getElementById('th-bp-whats-new');
    
            divElement.innerText = divElement.getAttribute('data-placeholder');
    
            divElement.addEventListener('focus', function () {
                if (divElement.innerText === divElement.getAttribute('data-placeholder')) {
                    divElement.innerText = '';
                }
            });
    
            divElement.addEventListener('blur', function () {
                if (divElement.innerText === '') {
                    divElement.innerText = divElement.getAttribute('data-placeholder');
                }
            });
    
            divElement.addEventListener('input', function () {
                document.getElementById('messagePrivate').value = this.innerHTML;
            });
        });
    
    
    </script>
    



   