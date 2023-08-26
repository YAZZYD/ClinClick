<aside>
        <div class="top">
            <div class="logo">
                <img src="{{ asset('import/assets/img/ClinClick.png')}}" >
                <h2>Clin<span class="danger">Click</span></h2>
            </div>
            <div class="close" id="close-btn">
            <span><ion-icon name="close"></ion-icon></span>
            </div>
        </div>
        <div class="sidebar">
            <a href="dashboard" class="">
            <span><ion-icon name="grid-outline"></ion-icon></span>
            <h3>Dashboard</h3>
            </a>


            <a href="customers" >
            <span><ion-icon name="person-outline"></ion-icon></span>
            <h3>Utilisateur</h3>
            </a>

            <a href="requests">
            <span><ion-icon name="git-pull-request-outline"></ion-icon></span>
            <h3>Demandes</h3>
            </a>


            <a href="#">
            <span><ion-icon name="analytics-outline"></ion-icon></span>
            <h3>Analytics</h3>
            </a>




            <a href="#">
            <span><ion-icon name="alert-circle-outline"></ion-icon></span>
            <h3>Rapport</h3>
            </a>


            <a href="#">
            <span><ion-icon name="settings-outline"></ion-icon></span>
            <h3>paramètre</h3>
            </a>



            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <span><ion-icon name="log-out-outline"></ion-icon></span>
            <h3>Déconnecter</h3>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </a>

        </div>
    </aside>