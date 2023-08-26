@extends('layouts.masterM')
@section('title')
panne
@endsection
@section('css')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        font-family: Arial, sans-serif;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
    }
    
    .modal1 {
    display: none;
    z-index: 1;
    left: 0;
    top: 0;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }
  
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
  }
  
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  
  form {
    margin-top: 20px;
  }
  
  input[type="date"],
  input[type="number"] {
    width: 100%;
    padding: 12px;
    margin: 6px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>

@endsection
@section('content')
@php
$nom_cabinet= \App\Models\Cabinet::find($panne->cabinet_id)->value('name');
$equip= \App\Models\Equipement::find($panne->equipement_id)->first();
$marque= \App\Models\Marque::find($equip->marque_id)->first();
$type= \App\Models\Type::find($equip->type)->first()
@endphp

<main class="main-content">
        <h1>panne</h1>
        @error('date')
                <span style="text-align:center;color:red"><h1>{{$message}}</h1></span>
                @enderror
        <div class="card">
            <div class="card-header">
                <h2>Panne Details</h2>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <th><h2>cabinet</h2></th>
                        <th><h2>equipement</h2></th>
                        <th><h2>marque</h2></th>
                        <th><h2>type</h2></th>
                        <th><h2>description</h2></th>
                        <th><h2>etat</h2></th>
                        <th><h2>date</h2></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><h3>{{ $nom_cabinet }}</h3></td>
                        <td><h3>{{ $equip->name }}</h3></td>
                        <td><h3>{{$marque->name}}</h3></td>
                        <td><h3>{{$type->name}}</h3></td>
                        <td><h3>{{ $panne->desc }}</h3></td>
                        <td><h3>{{ $panne->etat }}</h3></td>
                        <td><h3>{{ $panne->created_at }}</h3></td>
                        <td><button class="button" id="envoioffre">Envoyer offre</button></td>
                    </tr>
                </table>
            </div>
        </div>
<div id="modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Envoyer offre de réparation</h2>
            <br><br>
            <form method="POST" action="{{route('envoyerOffre')}}">
                @csrf
                <input type="date" id="date" name="date" placeholder="Date">
                <input type="hidden" id="panne" name="panne" value="{{$panne->id}}">
                <input type="number" min="1" name="prix" placeholder="Prix">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
   
</main>
@endsection