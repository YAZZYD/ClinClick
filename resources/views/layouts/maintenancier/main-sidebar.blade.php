<aside>
        <div class="top">
            <div class="logo">
                <img src="{{ asset('import/assets/img/ClinClickM.png')}}" >
                <h2>Clin<span class="danger">Click</span></h2>
            </div>
            <div class="close" id="close-btn">
            <span><ion-icon name="close"></ion-icon></span>
            </div>
        </div>
        <div class="sidebar" >
            <a href="dashboard" class="">
            <span><ion-icon name="grid-outline"></ion-icon></span>
            <h3>Dashboard</h3>
            </a>


            <a href="/maintenancier/pannes">
            <span><ion-icon name="construct-outline"></ion-icon></span>
            <h3>Liste des pannes</h3>
            </a>

            <a href="#">
            <form method="GET" action={{url('/maintenancier/market')}}>
            @csrf
          <!--  <input type="hidden" id="cabinet" name="cabinet" value=""/>-->
            <span class="cart"> <ion-icon name="cart-outline"></ion-icon> </span>
            <button type="submit">Market</button>
            </form>
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



            <a href="#" >
            <span><ion-icon name="add-outline"></ion-icon></span>
            <h3>Ajouter Produit</h3>
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
    