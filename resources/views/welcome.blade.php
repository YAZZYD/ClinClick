<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">

<!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Accueil - ClinClick</title>
    <link rel="stylesheet" href="{{ asset('import/assets/css/Accueil.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('import/assets/img/ClinClick.png')}}" alt="Logo"></a>
        <h2>Clin<span class="danger">Click</span></h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav  ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <a href="/login" class="btn btn-primary ms-lg-3">Commencer</a>
        </div>
    </div>
</nav>

    <!-- Header -->
    <header>
        <nav>
            <!-- Menu de navigation -->
        </nav>
        <div class="hero">
            <h1>Bienvenue sur ClinClick</h1>
            <p>Votre accompagnant en un seul Clique!</p>
            <a href="#about" class="btn1">En savoir plus</a>
        </div>
    </header>

    <!-- À propos -->
    <section id="about">
        <div class="container">
            <h2>À propos de ClinClick</h2>
            <p>
                ClinClick est une plateforme en ligne qui vise à faciliter , la collaboration avec les fournisseurs et la maintenance des équipements médicaux. Nous offrons une solution intégrée pour les professionnels de santé, y compris les gérants de cabinet, les fournisseurs et les maintenanciers.
            </p>
        </div>
    </section>

    <!-- Caractéristiques -->
    <section id="features" class="bg-light">
        <div class="container">
            <h2>Caractéristiques principales</h2>
            <div class="feature-list">
                <div class="feature">
                    <img src="{{ asset('import/assets/img/gerant.png')}}" alt="Icône fonctionnalité 1">
                    <h3>Gérant cabinet Médicale</h3>
                    <p>Permettez aux gérants de cabinet médical de gérer facilement les commandes et de signaler les pannes des machines et équipements de leur cabinet médical.</p>

                </div>
                <div class="feature">
                    <img src="{{ asset('import/assets/img/fournisseur.png')}}" alt="Icône fonctionnalité 2">
                    <h3>Fournisseur</h3>
                    <p>Permettez aux fournisseurs de gérer facilement l'ajout de produits, ainsi que le traitement des commandes de cabinet et des commandes de maintenance.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('import/assets/img/maintenancier.png')}}" alt="Icône fonctionnalité 3">
                    <h3>Maintenancier</h3>
                    <p>Permettez aux maintenanciers de gérer les demandes de réparations des équipements médicaux .</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section id="testimonials">
        <div class="container">
            <h2>Témoignages</h2>
            <div class="testimonial-list">
                <div class="testimonial">
                    <img src="{{ asset('import/assets/img/avatar.jpg')}}" alt="Avatar utilisateur 1">
                    <blockquote>
                        <p>Grâce à ClinClick, notre cabinet médical a pu optimiser sa gestion administrative et améliorer l'efficacitéglobale de nos opérations. C'est une plateforme extrêmement utile pour les professionnels de santé.</p>
                        <cite>Dr. Martin Dupont</cite>
                    </blockquote>
                </div>
                <div class="testimonial">
                    <img src="{{ asset('import/assets/img/avatar.jpg')}}" alt="Avatar utilisateur 2">
                    <blockquote>
                        <p>ClinClick nous a permis de simplifier nos interactions avec les fournisseurs et d'effectuer facilement nos commandes de matériel médical. C'est un outil essentiel pour notre activité.</p>
                        <cite>Lucie Tremblay, Responsable des achats</cite>
                    </blockquote>
                </div>
                <div class="testimonial">
                    <img src="{{ asset('import/assets/img/avatar.jpg')}}" alt="Avatar utilisateur 3">
                    <blockquote>
                        <p>En tant que maintenancier, ClinClick m'a aidé à mieux gérer les demandes d'entretien des équipements médicaux. Je peux suivre les interventions et assurer un service de qualité.</p>
                        <cite>Paul Dubois, Technicien de maintenance</cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

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
                    <li>Adresse: 123 rue, Ville, Pays</li>
                    <li>Téléphone: +1234567890</li>
                    <li>Email: ClinClick@gmail.com</li>
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
<script src="{{ asset('import/assets/js/Accueil.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>




</body>
</html>
