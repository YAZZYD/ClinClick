<aside>
        <div class="top">
            <div class="logo">
                <img src="{{ asset('import/assets/img/ClinClickF.png')}}" >
                <h2>Clin<span class="danger">Click</span></h2>
            </div>
            <div class="close" id="close-btn">
            <span><ion-icon name="close"></ion-icon></span>
            </div>
        </div>
        <div class="sidebar" >
            <a href="/fournisseur/dashboard" >
            <span><ion-icon name="grid-outline"></ion-icon></span>
            <h3>Dashboard</h3>
            </a>

            <a href="/fournisseur/produits">
            <span><ion-icon name="cube-outline"></ion-icon></span>
            <h3>Produits</h3>
            </a>


            <a href="/fournisseur/commandes">
            <span><ion-icon name="receipt-outline"></ion-icon></span>
            <h3>Commandes</h3>
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



            <a href="#" id="addProductButton" >
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
    <!--Ajouter produit modal-->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Ajouter un produit</h2>
        <form method="POST" action="{{route('ajoutProduit')}}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="details">{{__('Nom de produit')}}</label><br>
        <input type="text" id="name" name="name" placeholder="Entrer le nom du produit"><br>
        <label for="qte" class="details">{{__('Quantité')}}</label><br>
        <input type="number" id="qte" name="qte" placeholder="Entrer la quantité de produit"><br>
        <label for="prix" class="details">{{__('Prix')}}</label><br>
        <input type="number" id="prix"name="prix" placeholder="Entrer le prix du produit"><br>
        <label for="categorie" class="details">{{__('Catégorie')}}</label><br>
        <input type="text" id="categorie" name="categorie" placeholder="Entrer la catégorie du produit"><br>

        <label for="type" class="details">{{__('Type')}}</label><br>
        <select id="type" name="type">
        <option value="consommable">consommable</option>
        <option value="non consommable">non consommable</option>
        <option value="piece">piece</option>
        </select><br>

        <label for="image" class="details">{{__('Importer Image ')}}</label>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg">
        <br>
        <button class="success button-corner" type="submit">ajouter Produit</button>
                    </form>
    </div>
</div>

    