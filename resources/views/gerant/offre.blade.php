@extends('layouts.masterG')
@section('title')
Offre
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

</style>

@section('content')
@php
    $gerant = auth('gerant')->user();
@endphp
@section('name')
@endsection
@section('email')
@endsection

@php
$maint=\App\Models\Maintenancier::find($offre->maintenancier_id)->first();
$equip_id=\App\Models\Panne::find($offre->panne_id)->value('equipement_id');
$equipement=\App\Models\Equipement::find($equip_id)->first();
@endphp
<main class="main-content">
        <h1>Offre de réparation</h1>
        <div class="card">

            <div class="card-body">
                <table>
                    <tr>
                        <th>equipement en panne</th>
                        <th>Réparateur</th>
                        <th>email</th>
                        <th>Date réparation</th>
                        <th>Prix </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{$equipement->name}}</td>
                        <td>  {{$maint->name}}</td>
                        <td>{{$maint->email}}</td>
                        <td>{{$offre->date}}</td>
                        <td>{{$offre->prix}} DZD</td>
                        <td>
                            <form  method="POST"action="{{route('validerOffre',$offre->id)}}">
                                @csrf
                                <input type="hidden" id="panne" name="panne" value="{{$offre->panne_id}}">
                                <input type="hidden" id="equip" name="equip" value="{{$equipement->id}}">
                            <button class="button" type="submit">Valider</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>



</main>
@endsection