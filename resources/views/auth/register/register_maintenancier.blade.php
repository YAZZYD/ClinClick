<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('import/assets/css/register.css') }}">
  <style>
    /* Custom styles for the form */
    .signup-form {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
    }
    
    .signup-form .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .signup-form h1 {
      font-family: 'Roboto', sans-serif;
      font-size: 24px;
      font-weight: bold;
      text-align:center;
      margin-bottom: 20px;
      color:black;
    }
    .signup-form  h2 {
      font-family: 'Roboto', sans-serif;
      font-size: 24px;
      font-weight: bold;

      margin-bottom: 20px;
    }
    
    .signup-form hr {
      margin-top: 20px;
      margin-bottom: 20px;
    }
    
    .signup-form .form-group {
      margin-bottom: 20px;
    }
    
    .signup-form label.checkbox-inline {
      font-weight: normal;
    }
    
    .signup-form .btn-primary {
      width: 100%;
    }
    
    .signup-form .hint-text {
      text-align: center;
      margin-top: 20px;
    }
    
    /* Custom styles for positioning sections side by side */
    @media (min-width: 768px) {
      .signup-form .info-sections {
        display: flex;
      }
    
      .signup-form .info-sections .info-gerant {
        flex: 1;
        margin-right: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="signup-form">
    <form action="{{ route('register.maintenancier') }}" method="post" enctype="multipart/form-data">
      <div class="logo">
        <img src="{{ asset('import/assets/img/ClinClick.png')}}" alt="logo">
        <h2>Clin<span class="danger">Click</span></h2>
      </div>
      @csrf

      <h1 >S'inscrire</h1>

      <hr>
      <div class="info-sections">
        <div class="info-gerant">
          <!-- Info de gérant -->
          <h2>Info maintenancier</h2>
          <div class="form-group">
            <div class="row">

              <div class="col-xs-6">
                <input type="text" class="form-control" name="first_name" placeholder="Prénom" required="required" value="{{ old('first_name') }}">
                @error('first_name')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-xs-6">
                <input type="text" class="form-control" name="last_name" placeholder="Nom" required="required" value="{{ old('last_name') }}">
                @error('last_name')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="{{ old('email') }}">
            @error('email')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">
            @error('password')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmez le mot de passe" required="required">
            @error('confirm_password')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="info-cabinet">
          <!-- Info de cabinet -->
<br><br>



          
          <div class="form-group">
            <input type="text" class="form-control" name="adress" id="adress" placeholder="Adresse" required="required" value="{{ old('localisation') }}">
            @error('adress')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="tel" placeholder="N° téléphone" required="required" value="{{ old('Num-tele') }}">
            @error('tel')
              <span class="error">{{ $message }}</span>
            @enderror
            <br>
            <input type="file" class="form-control" name="file" id="file" placeholder="Fichier" value="{{ old('file') }}">
            @error('file')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
          
          <div class="form-group">
          @php
          $types= DB::table('types')->get()->toArray();
          @endphp
          <span>Compétences</span><br>
          @foreach($types as $type)
        <input type="checkbox" name="competences[]" value="{{ $type->id }}" id="competence_{{ $type->id }}">
        <label for="item_{{ $type->id }}">{{ $type->name }}</label><br>
    
          @endforeach         
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte les <a href="#">Conditions d'utilisation</a> &amp; <a href="#">Politique de confidentialité</a></label>
        @error('checkbox')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
      </div>
      <div class="hint-text">Vous avez déjà un compte ? <a href="{{ url('login')}}">Connectez-vous ici</a></div>
    </form>
   
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
