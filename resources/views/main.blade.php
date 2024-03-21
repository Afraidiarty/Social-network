
@extends('inc.layout')

@section('title')
    Авторизация
@endsection


@section('content')
    <div class="main-c">
        <section class="friends-sect">
            <h2>Friends</h2>
            <div class="container-friends">
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                <div class="friends">
                    <div class="photo-profle"><img src="https://demo.tophivetheme.com/metafans/classic/wp-content/uploads/sites/10/avatars/16/1707967883-bpfull.jpg" alt=""></div>
                </div>
                
            </div>
          </section>

          <section id="myBtn" style="display: flex; height: 63px; width: 600px;cursor: pointer;">
            <div  id="myBtn" class="myphoto"><img src="{{ asset('/public/storage/' . $user_info['id_image']) }}" alt=""></div>
            <span id="myBtn" class="ac-post">What's on your mind?</span>
        </section>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="title-modal">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <span style="color: black" >Create Post</span>
                </div>

                <form id="myForm" action="{{ route('CreatePost') }}" method="post">
                    @csrf
                    <div contenteditable="true" class="bp-suggestions advanced-th-bp-activity-form" data-placeholder="What's on your mind, John?" id="th-bp-whats-new" cols="50" rows="10"></div>
                    <input type="hidden" name="messagePost" id="messagePost">
                    <div class="send">
                        <input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="Post">
                    </div>
                </form>
                
                
            </div>
        </div>
        
        

          <section>

          </section>
     
    </div>
    @if(isset($data))
    <div class="posts">
        @foreach ($data as $post)
        <section class="allposts">
            <div class="logo_t"><img class="post-logo" src="{{ asset('/public/storage/' . $user_info['id_image']) }}" alt="">
                <div class="info-posts">
                    <div class="name"><span class="AuthorPost" >{{$post->name}}</span></div>
                    <div class="data"><span class="dataPosts" id="postTime" style="" >{{$post->created_at}}</span></div>
                </div>
                <div class="settingspost">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                    </svg>
                </div>
            </div>

            <div class="posts-messages">
             <span class="post-mess"> {{$post->message}}  </span> 
            </div>

            <div class="activity-footer-links">
                <div class="th-bp-footer-meta"><div class="reactions-meta" data-activity-id="5852"></div><div class="comments-meta activity-comments-meta-5852" data-activity-id="5852"><a href="" class=""></a></div></div><div class="th-bp-footer-meta-actions"><div class="th-bp-post-like-button th-bp-activity-like-button">
                    <a href="#" data-reaction="" data-id="5852" class="button" data-user="16" data-nonce="2f8ee88301">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg> Like
                    </a>
                    <span class="reaction_icons">
    
                        <span class="reaction_icon_con">
                            <img data-activity-id="5852" data-type="like" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/like.png" alt="reaction">
                            <span class="reaction_icon_tooltip">like</span>
                        </span>
    
                        <span class="reaction_icon_con">
                           <img data-activity-id="5852" data-type="love" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/love.png" alt="reaction">
                            <span class="reaction_icon_tooltip">love</span>
                        </span>
    
                        <span class="reaction_icon_con">
                            <img data-activity-id="5852" data-type="haha" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/haha.png" alt="reaction">
                            <span class="reaction_icon_tooltip">haha</span>
                        </span>
    
                        <span class="reaction_icon_con">
                            <img data-activity-id="5852" data-type="wow" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/wow.png" alt="reaction">
                            <span class="reaction_icon_tooltip">wow</span>
                        </span>
    
                        <span class="reaction_icon_con">
                            <img data-activity-id="5852" data-type="cry" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/sad.png" alt="reaction">
                            <span class="reaction_icon_tooltip">cry</span>
                        </span>
    
                        <span class="reaction_icon_con">
                            <img data-activity-id="5852" data-type="angry" src="https://demo.tophivetheme.com/metafans/classic/wp-content/themes/metafans/assets/images/reactions/angry.png" alt="reaction">
                            <span class="reaction_icon_tooltip">angry</span>
                        </span>
    
                    </span>
                </div><div class="th-bp-post-comment-button">
                        <a href="" data-activity-id="activity-5852" class="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            <span>Comment</span>
                        </a>
                    </div><div class="th-bp-post-share-button th-ml-auto">
                        <a href="" data-activity-id="5852" class="button activity-share">
                            <span class="share_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg></span>
                            <span>Share</span>
                        </a>
                        <ul class="sharing-options">
                            <li><a href="5852" class="timeline-share"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                                <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"></path>
                                </svg>Share on activity</a></li>
                                                <li><a target="_blank" data-share-type="twitter" href="https://twitter.com/intent/tweet?url=https://demo.tophivetheme.com/metafans/classic/activity/p/5852/"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                                </svg>Share on twitter</a></li>
                                                <li><a target="_blank" data-share-type="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://demo.tophivetheme.com/metafans/classic/activity/p/5852/"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                                </svg>Share on facebook</a></li>
                                                <li><a data-share-type="whatsapp" href="whatsapp://send?text=https://demo.tophivetheme.com/metafans/classic/activity/p/5852/" data-action="share/whatsapp/share"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                </svg>Share on whatsApp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

        </section>
         @endforeach
    </div>
    @endif


    <script src="../js/script.js"></script>

@endsection

<script>
 document.addEventListener('DOMContentLoaded', function () {
  var divElement = document.getElementById('th-bp-whats-new');

  // Установка начального текста из атрибута data-placeholder
  divElement.innerText = divElement.getAttribute('data-placeholder');

  // Обработчик события для очистки начального текста при фокусировке
  divElement.addEventListener('focus', function () {
    if (divElement.innerText === divElement.getAttribute('data-placeholder')) {
      divElement.innerText = '';
    }
  });

  // Обработчик события для восстановления начального текста, если поле остается пустым
  divElement.addEventListener('blur', function () {
    if (divElement.innerText === '') {
      divElement.innerText = divElement.getAttribute('data-placeholder');
    }
  });
});

document.getElementById('th-bp-whats-new').addEventListener('input', function() {
                        document.getElementById('messagePost').value = this.innerHTML;
});
</script>
