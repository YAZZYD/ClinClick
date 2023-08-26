@extends('layouts.masterG')
@section('css')
<style>
        .main-content {
            margin-top: 100px;
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
        }
    
        .form-label {
            font-weight: bold;
            margin-top: 20px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form select{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form input{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
        }
        @media (min-width: 768px) {
      .form2 {
        display: flex;
      }
    
       .form2 .form1 {
        flex: 1;
        margin-right: 10px;
      }
    }
    </style>
@endsection
@php
$gerant = auth('gerant')->user();
@endphp

@section('content')
    @section('name')
    {{$gerant->name}}
    @endsection
    @section('email')
    {{$gerant->email}}
    @endsection
<main class="main-content">
        <h1>Modifier Info {{$cabinet->name}}</h1>
        <form  class="form1"method="POST" action="{{route('modifierCabinet',$cabinet->id)}}">
            @csrf
            @method('PATCH')
            <label for="name" class="form-label">Nom du cabinet</label><br>
            <input type="text" id="name" name="name" class="form-input" value="{{$cabinet->name}}"><br>

            <label for="adress" class="form-label">Adresse du cabinet</label><br>
            <input type="text" id="adress" name="adress" class="form-input" value="{{$cabinet->adress}}"><br>

            <button type="submit" class="form-button">Modifier</button>
        </form>
        <br>
        <h1>gérer les équipements</h1>
        <br>
        <div class="recent-orders">
        <table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Marque</th>
      <th>Type</th>
      <th>Etat</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cabinet->equipements as $equipement)
    <tr>
      @php
      $marque = DB::table('marques')->where('id', $equipement->marque_id)->value('name');
      $type = DB::table('types')->where('id', $equipement->type_id)->value('name');
      @endphp
      <td>{{ $equipement->name }}</td>
      <td>{{ $marque }}</td>
      <td>{{ $type }}</td>
      <td>{{ $equipement->pivot->etat }}</td> 
    </tr>
    @endforeach
  </tbody>
</table>
  </div>




@php
$types=App\Models\Type::all();
$marques=App\Models\Marque::all();
@endphp
<form class="form2" method="POST" action="{{route('ajouterEquip',$cabinet->id)}}">
    @csrf
    <input class="form-label" type="text" id="nomEquip" name="nomEquip" placeholder="Nom équipement">
    <br><br>
    @error('nomEquip')
    @enderror
   
    <select id="typeEquip" name="typeEquip" class="form-label">
        @foreach($types as $type)
        <option>{{$type->name}}</option>
        @endforeach
    </select>
    <br><br>
    <select class="form-label" id="marqueEquip" name="marqueEquip" placeholder="marque équipement">
        @foreach($marques as $marque)
        <option>{{$marque->name}}</option>
        @endforeach
    </select>
    <br><br>
    <button type="submit" class="form-button">ajouter</button>
</form>
    </main>
@endsection