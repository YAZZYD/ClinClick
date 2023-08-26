<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Magasin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('import/assets/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" > 
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#"><img src="{{ asset('import/assets/img/ClinClick.png')}}" alt="Logo"></a>
	          <h2>Clin<span class="danger">Click</span></h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link"  href="/gerant/dashboard">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">1</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">2</a></li>
                                <li><a class="dropdown-item" href="#!">3</a></li>
                            </ul>
                        </li>
                        <form method="GET" action="{{route('gerant.rechercher')}}" class="form-inline my-2 my-lg-0">
                        @csrf
                        <input type="hidden" id="cabinet" name="cabinet" value="{{$cabinet}}">
                        <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
                        </form>
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @php
                          $gerant = auth('gerant')->user();
                        @endphp
                          Bonjour,{{$gerant->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Mon compte</a>
                          <a class="dropdown-item" href="#">Mes commandes</a>
                          <a class="dropdown-item" href="#">Ma liste d'envies</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Déconnexion
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form> 
                      </a>
                    </div>
                  </li>
        <li class="nav-item">
		  <form method="GET" action="{{route('afficherPanier')}}">
				@csrf
				<input type="hidden" id="cabinet" name="cabinet" value="{{$cabinet}}"/>
				<a  class="nav-link" href="#" > <button type="submit"> <i class="fas fa-shopping-cart"></i> Panier</button></a>
			</form>
        </li>
      </ul>
                </div>
            </div>
        </nav>

        <nav class="sub-nav">
    <div class="container px-4 px-lg-5 my-5">
        <ul class="nav-list">
        <li class="nav-item"><a href="/gerant/market/categories/1" class="nav-link">équipements d’urgence</a></li>
            <li class="nav-item"><a href="/gerant/market/categories/2" class="nav-link">équipements de laboratoire</a></li>
            <li class="nav-item"><a href="/gerant/market/categories/3" class="nav-link">équipements à vocation thérapeutique</a></li>
            <li class="nav-item"><a href="/gerant/market/categories/4" class="nav-link">équipements de diagnostic médical</a></li>
            <li class="nav-item"><a href="/gerant/market/categories/5" class="nav-link">fournitures médicales consommables</a></li>
        </ul>
    </div>
</nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="product-list">
    @foreach($produits as $produit)
        @foreach($produit->fournisseurs as $fournisseur)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img src="{{asset('storage/produit_uploads/'.$fournisseur->pivot->image)}}" alt="Produit 1">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="product-content">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$produit->name}}</h5>
                            <p> Produit de type {{$produit->type}}, ajouteé par {{$fournisseur->name}}</p>
                           <p>Quantité disponible {{$fournisseur->pivot->qte}}</p>
                            <!-- Product reviews-->
                            <div class="rev">
                             <!-- Product price-->
                            <span class="text-muted text-decoration-line-through"></span>
                           <h5> {{$fournisseur->pivot->prix}} DZD</h5>
                            
                            </div>

                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer">
                        <div class="text-center">
                            <form id="addToCartForm" method="POST" action="{{route('ajouterAchat')}}">
                                @csrf
                                <input type="hidden" value="{{$fournisseur->id}}" name="fournisseur" />
                                <input type="hidden" value="{{$produit->id}}" name="produit" />
                                <input type="hidden" value="{{$cabinet}}" name="cabinet" />
                                <input type="number" min="1" name="qte" placeholder="entrer la quntité" /><br>
                                <button type="submit" class="btn btn-outline-dark mt-auto" onclick="AjoutAuPanier()">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h5 class="text-white">À propos de nous</h5>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius finibus erat ut hendrerit.</p>
            </div>
            <div class="col-lg-4">
                <h5 class="text-white">Contactez-nous</h5>
                <ul class="list-unstyled text-muted">
                    <li>Adresse : 123 rue, Ville, Pays</li>
                    <li>Téléphone : +1234567890</li>
                    <li>Email : ClinClick@gmail.com</li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="text-white">Suivez-nous</h5>
                <ul class="list-inline social-icons">
                    <li class="list-inline-item"><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi bi-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="m-0 text-center text-white">© 2023 ClinClick. Tous droits réservés.</p>
    </div>
</footer>

        <script src="{{ asset('import/assets/js/alerts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->

        <script src="{{ asset('import/assets/js/alerts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Jquery -->
		<script src="{{ asset('import/assets/js/bootstrap/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('import/assets/js/bootstrap/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{ asset('import/assets/js/bootstrap/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{ asset('import/assets/js/bootstrap/popper.min.js')}}"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('import/assets/js/scripts.js')}}"></script>
    </body>
</html>