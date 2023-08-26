<!DOCTYPE html>
<html>
<head>
  <title>Validation par e-mail</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f9fafc;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .header {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .logo {
      max-width: 100px;
    }
    
    h2 {
      color: #333333;
      margin-top: 0;
      max-width: 100px;
    }
    span{
        color:blue;
    }
    p {
      color: #666666;
      margin-bottom: 20px;
    }
    
    .button-container {
      text-align: center;
    }
    
    .button {
      display: inline-block;
      padding: 12px 24px;
      background-color: #4CAF50;
      color: #ffffff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="{{ asset('import/assets/img/ClinClick.png')}}" alt="Logo" class="logo">
      <h2>Clin<span>Click</span></h2>
    </div>
    
    <p>Cher Utilisateur,</p>
    <p>Nous avons le plaisir de vous informer que votre demande a été approuvée. Vous êtes désormais autorisé à travailler en mode professionnel sur notre plateforme ClinClick.</p>
    <p>Nous vous souhaitons une expérience professionnelle fructueuse et enrichissante sur notre plateforme.</p>
    
    <div class="button-container">
      <a href="#" class="button">Accéder à ClinClick</a>
    </div>
  </div>
</body>
</html>
