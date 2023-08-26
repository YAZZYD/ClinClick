<h3>Bonjour {{$fournisseur->name}}</h3>
<h4>New commande from {{$maint->name}}</h4>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nouvelle commande à traiter</title>
  <!-- Inclure les liens CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
    }

    .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 100px;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      padding: 30px;
    }

    .card-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .card-text {
      font-size: 16px;
      color: #555;
      line-height: 1.5;
    }

    .commande-details {
      font-family: monospace;
      white-space: pre-wrap;
    }

    .tab {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .tab button {
      border: none;
      background-color: transparent;
      color: #888;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      margin-right: 10px;
      padding: 5px 10px;
      transition: color 0.3s;
    }

    .tab button:hover {
      color: #333;
    }

    .platform-button {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .platform-button a {
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      color: #fff;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      padding: 10px 20px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .platform-button a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <div class="card">
      <h5 class="card-title">Nouvelle commande à traiter</h5>
      <p class="card-text">Bonjour <span id="fournisseur"> {{$fournisseur->name}}</span>,</p>
      <p class="card-text">Une nouvelle commande a été ajouté par {{$maint->name}}</p>
      <pre id="commande" class="card-text commande-details"></pre>
    </div>
    <div class="platform-button">
      <a href="#">Accéder à la plateforme</a>
    </div>
  </div>

  <!-- Inclure les scripts JavaScript de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

  <script>
    // Remplacer les valeurs avec les données réelles
    var Client = 'Client@example.com';
    var commande = 'Numéro de commande : 12345\nProduit : XYZ\nQuantité : 10';

    // Mettre à jour les éléments HTML avec les données
    document.getElementById('Client').textContent = fournisseur;
    document.getElementById('commande').textContent = commande;
  </script>
</body>
</html>
