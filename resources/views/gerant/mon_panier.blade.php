
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#"><img src="{{ asset('import/assets/img/ClinClick.png')}}" alt="Logo"></a>
	          <h2>Clin<span class="danger">Click</span></h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Accueil</a></li>
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
      </ul>
                </div>
            </div>
        </nav>

        <!-- Section-->
        <section>
        <div class="cart-container">
    <h1>Mon Panier</h1>
    <h3>{{ $cabinet->name }}</h3>
    @error('connection')
    <span class="error">{{$message}}</span>
    @enderror
    @if (count($achats) > 0)
    <table>
        <tr>
            <th>Produit</th>
            <th>Fournisseur</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</th>
            <th></th>
        </tr>
        @foreach($achats as $achat)
        @php
        $nom_produit = DB::table('produits')->where('id', $achat->produit_id)->value('name');
        $nom_fournisseur = DB::table('fournisseurs')->where('id', $achat->fournisseur_id)->value('name');
        $prix_produit = DB::table('produit_fournisseur')
        ->where('produit_id', $achat->produit_id)
        ->where('fournisseur_id', $achat->fournisseur_id)
        ->value('prix');
        $total = $achat->qte * $prix_produit;
        @endphp
        <tr>
            <td>{{ $nom_produit }}</td>
            <td>{{ $nom_fournisseur }}</td>
            <td>{{ $prix_produit }} DZD</td>
            <td>{{ $achat->qte }}</td>
            <td>{{ $total }} DZD</td>
            <td>
                <form class="button-container" method="POST" action="{{ route('supprimerAchat', $achat->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>

            </td>
        </tr>
        @endforeach
        
    </table>
              <form  class="button-container"method="POST" action="{{ route('commander') }}">
                    @csrf
                    <input type="hidden" id="cabinet" name="cabinet" value="{{ $cabinet->id }}" />
                    <button type="submit" class="btn btn-primary">Commander</button>
               </form>
              <a href="/gerant/market"> <button type="submit" class="btn btn-primary">Poursuivre l'achat </button></a>

    
    @else
    <div>

        <p class="alert">Votre panier est vide.</p><br>
        <a href="/gerant/market" class="btn btn-primary">Commencer l'achat</a>

</div>  
    @endif
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

