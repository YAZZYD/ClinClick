@extends('layouts.masterG')
@section('title')
Mon cabinet
@endsection
@section('css')
<style>

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


    <main class="main-content1">
    <h1 class="cabinet-heading">Mon Cabinet</h1>
    <div class="profile-view">
 
  <div class="cabinet-info">
    <h4 class="cabinet-name">{{$cabinet->name}}</h4>
    <h4 class="cabinet-address">{{$cabinet->adress}}</h4>
  </div>
  <a href="{{url('/gerant/moncabinet/modifier/'.$cabinet->id)}}">
    <button class="btn btn-modifier">Modifier</button>
  </a>
</div>

<br>
<h2 class="equip">Mes équipements</h2>
@error('equipement_id')
    <span style="text-align:cenetr;color:red"><h2>{{$message}}</h2></span>
    @enderror
<div class="card-container">

  @foreach($cabinet->equipements as $equipement)
  
  <div class="card">
  @php
  $marque=DB::table('marques')->where('id',$equipement->marque_id)->value('name');
  $type=DB::table('types')->where('id',$equipement->type_id)->value('name');
  @endphp
      <div class="card-header">
        {{ $equipement->name }}
      </div>
      <div class="card-body">
        <p>Marque: {{$marque }}</p>
        <p>Type: {{ $type}}</p>
        <p>etat: {{$equipement->pivot->etat }}</p>

        <div class="btn">
        <button href="" class="btn-signal-panne"  data-id="{{ $equipement->id }}">Signaler</button>
        </div>
      </div>
    </div>
    <div id="modal1{{ $equipement->id }}" class="modal1">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Signaler une panne</h2>
    <form  method="POST" action="{{route('signalerPanne')}}">
@csrf 
<div class="form-group">  
<label for="equipement_id">Equipement</label>
<select name="equipement_id" id="equipement_id">
   @foreach($cabinet->equipements as $equipement)
    <option value="{{$equipement->id}}">{{$equipement->name}}</option>
    @endforeach
</select>
</div>


    <div class="form-group"> 
        <label for="description">Description de la panne:</label>
        <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn1 btn-primary">Signaler la panne</button>
      </div>
     <input type="hidden" id="cabinet" name="cabinet" value="{{$cabinet->id}}">
    </form>
  </div>
</div>


    
                
  @endforeach
</div>


</div>

</main>



@endsection


