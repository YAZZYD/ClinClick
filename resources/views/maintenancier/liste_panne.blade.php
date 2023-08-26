@extends('layouts.masterM')
@section('title')
Liste Panne 
@endsection
@section('css')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        font-family: Arial, sans-serif;
        font-weight: 200;
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

   
    form input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  form input[type="submit"]:hover {
    background-color: #45a049;
  }

</style>

@endsection
@section('content')


<main class="main-content">
        <h1>panne</h1>
        <div class="card">
            <div class="card-header">
                <h2>Panne Details</h2>
            </div>
           
            <div class="card-body">
                <table>
                    <tr>
                        <th>cabinet</th>
                        <th>equipement</th>
                        <th>marque</th>
                        <th>type</th>
                        <th>description</th>
                        <th>etat</th>
                        <th>date</th>
                        <th></th>
                    </tr>
                    @foreach($pannes as $panne)
                    @php
                    $nom_cabinet= \App\Models\Cabinet::find($panne->cabinet_id)->value('name');
                    $equip= \App\Models\Equipement::find($panne->equipement_id)->first();
                    $type=\App\Models\Type::find($equip->type_id)->value('name');
                    $marque= \App\Models\Marque::find($equip)->value('name');
                    @endphp
                    <tr>
                        <td>{{ $nom_cabinet }}</td>
                        <td>{{ $equip['name'] }}</td>
                        <td>{{$marque}}</td>
                        <td>{{$type}}</td>
                        <td>{{ $panne->desc }}</td>
                        <td>{{ $panne->created_at }}</td>
                        <td>
                            <form method="get"action="{{route('detailPanne',$panne->id)}}">
                            @csrf
                                 <button type="submit">Détails</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        

</main>
@endsection