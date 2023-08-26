@extends('layouts.masterF')
@section('css')
<style>
        body {
  font-family: Arial, sans-serif;
  margin: 20px;
}

h1 {
  color: #333;
}

label {
  display: block;
  margin-top: 10px;
}

input[type="submit"] {
  margin-top: 20px;
}
</style>
@endsection
@section('content')
<main class="main-content">
<h1>Gestion du profil utilisateur</h1>

<form id="profileForm" enctype="multipart/form-data">
  <label for="profileImage">Photo de profil :</label>
  <input type="file" id="profileImage" name="profileImage">
  <br>
  <label for="name">Nom :</label>
  <input type="text" id="name" name="name">
  <br>
  <label for="email">Email :</label>
  <input type="email" id="email" name="email">
  <br>
  <input type="submit" value="Enregistrer les modifications">
</form>


</main>
@endsection