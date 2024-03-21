<div class="tophive-grid profle">
    <main class="main-inbox-small" >
        <div class="container-inner">
            <div class="entry-container">
                <div class="buddypress profile">
                    <div class="profile-info">
                        <div class="profile-logo">
                            <img id="image-preview" src="{{ asset('/public/storage/' . $user_me['id_image']) }}" alt="">
                        </div>
                        <div class="profiles">
                            <div class="profile-up">
                                <h3 class="profile-name" > {{ $user_me['name']}} </h3>
                                <div class="profile-role">{{ $user_me['role']}}</div>
                            </div>
                            <div class="profile-middle">
                                Joined : {{ \Carbon\Carbon::parse($user_me['created_at'])->format('F j, Y') }}
                            </div>
                            <div class="profile-counts">
                                <div class="counts">
                                    <div class="followers">
                                        <li><strong>{{ $user_me['Followers']}}</strong> Followers</li>
                                    </div>
                                    <div class="following">
                                        <li><strong>{{$user_me['Following']}}</strong> Following</li>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            
        </div>
        
    </main>

</div>