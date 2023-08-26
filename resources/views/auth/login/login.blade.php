<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('import/assets/css/login.css') }}"/>

</head>
<body>
<div class="container" id="container" >
    <div class="form-container sign-up-container">
        <form id="signup-form" method="POST" >
            @csrf
            <div class="text-center">
                <h1>Créer un compte</h1>
                <span>en tant que</span>
                <hr>
                <div class="btn-group-vertical">
                <button type="button" class="btn" onclick="window.location.href='{{url('register/gerant')}}'">
                    
                    <img src="{{ asset('import/assets/img/Gerant.png')}}" alt="Gerant">
                    <h4>Gerant</h4>
                </button>
                <hr>
                <button type="button" class="btn" onclick="window.location.href='{{url('register/maintenancier')}}'">
                    <img src="{{ asset('import/assets/img/Maintenancier.png')}}" alt="Mantenancier">
                    <h4>Maintenancier</h4>
                </button>
                <hr>
                <button type="button" class="btn" onclick="window.location.href='{{url('register/fournisseur')}}'">
                    <img src="{{ asset('import/assets/img/Fournisseur.png')}}" alt="Fournisseur">
                    <h4>Fournisseur</h4>
                </button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
    <form id="myForm" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Se connecter</h1>
        <div class="social-container">
            <a href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#">
                <i class="fab fa-google"></i>
            </a>
            <a href="#">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <span>Connectez-vous à votre compte</span>
        <div class="form-group">
            <label for="email">Adresse e-mail:</label>
            <input type="email" name="email" id="email" class="form-control" value="" required autofocus placeholder="Votre adresse e-mail">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" class="form-control" required placeholder="Votre mot de passe">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <a href="#">Mot de passe oublié ?</a>
        <button type="submit">Se connecter</button>
    </form>
</div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Vous avez déjà un compte</h1>
                <p>Pour rester connecté avec nous, veuillez vous connecter avec votre compte ici !</p>
                <button class="ghost" id="signIn">Se connecter</button>

            </div>
            <div class="overlay-panel overlay-right">
                <h1>Créez votre compte</h1>
                <p>Entrez vos informations personnelles et commencez votre parcours avec nous</p>
                <button class="ghost" id="signUp">S'inscrire</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('import/assets/js/login.js') }}"></script>
<script src="{{ asset('build/assets/app.css') }}"></script>
</body>
</html>
