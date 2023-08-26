
<nav class="right">
        <div class="top">
            <button id="menu-btn">
                 <span><ion-icon name="menu-outline"></ion-icon></span>
            </button>
                <div class="theme-toggler">
                    <span class="active"><ion-icon name="sunny-sharp"></ion-icon></span>
                    <span><ion-icon name="moon-sharp"></ion-icon></span>  
                </div>
                <div class="action1">
                    <span class="cart"> <a href="/gerant/market"> <ion-icon name="cart-outline"> </a> </ion-icon></span>
                </div>
                <div class="action2">
                <span class="notification"> <a href="{{route('gerant.notifications')}}"><ion-icon name="notifications-outline"></ion-icon></a></span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Salut, <b>@yield('name')</b></p>
                        <small class="text-muted">@yield('email')</small>
                    </div>
                    <div class="profile-photo">
                        <img src="{{ asset('import/assets/img/profile.jpg')}}" >
                    </div>
                    <ul class="profile-menu">
                        <li>
                            <div class="profile-header">
                            <div class="profile-photo">
                                <img src="{{ asset('import/assets/img/profile.jpg')}}" alt="Profile Photo">
                            </div>
                            <div class="info">
                                <p>Salut, <b>Meedy</b></p>
                                <small class="text-muted">Admin</small>
                            </div>
                            </div>
                            <hr>
                            <li><a href="#!">Profile</a></li>
                            <li><a href="#!">Paramétre</a></li>
                            <li><hr></li>
                            <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span><ion-icon name="log-out-outline"></ion-icon></span>
                                <h3>Déconnecter</h3>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </a>
                            </li>
                        </li>
                        </ul>

                </div>
        </div>
</nav> 
  