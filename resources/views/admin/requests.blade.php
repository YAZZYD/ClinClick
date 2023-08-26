@extends('layouts.masterA')
@section('title')
Demandes
@endsection
@section('css')
<style>
.modal1 ,.modal2 , .modal3 {
        display: none;
        
    }

    </style>
@endsection
@section('content')
<main class="main-content">
        <h1>Demandes</h1>

        @error('connection')
    <div class="errors">
    <span class="error"><h3>{{$message}}</h3></span>
    </div>
    @enderror
        <div class="tabs">
    <label class="tab-label active" data-tab="gerants-tab">Gérants</label>
    <label class="tab-label" data-tab="fournisseurs-tab">Fournisseurs</label>
    <label class="tab-label" data-tab="maintenanciers-tab">Maintenanciers</label>

    <div class="tab-content active" id="gerants-tab-content">
    <div class="recent-orders">

   
    <h2>Gérants</h2>
    
  
    
    @if(!empty($gerants))
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($gerants as $gerant)
                <tr>
                    <td>{!! $gerant->name !!}</td>
                    <td>{!! $gerant->email !!}</td>
                    <td>
                        <form method="POST" action="{{ route('validateGerant', $gerant->id) }}" onsubmit="confirmValidationU(event)">
                            @method("PATCH")
                            <button  type="submit" >Valider</button>
                        </form>
                    </td>
                    <td class="primary">
                    <a href="#" class="details-link" data-id="{{ $gerant->id }}">Détails </a>
                    </td>

                </tr>
                <div id="modal1{{ $gerant->id }}" class="modal1">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1>{{ $gerant->name }}</h1>
                            <h4>{{ $gerant->email }}</h4> 
                            <h4>{{$gerant->tel}}</h4>
                            <h4>Attachement</h4>
                            <img src='/public/attachements/{{$gerant->attachement}}' alt="pas d'attachements"/>
                            
                        </div>
                    </div>
            @endforeach

        </tbody>
    </table>

@else
    <div class="vide">
         <p>Aucune demande..</p>
    </div>
   
@endif

        </div>
    </div>
    <div class="tab-content" id="fournisseurs-tab-content">
    <div class="recent-orders">
           <h2>Fournisseur </h2>
    @if(!empty($fournisseurs))
           <table>
            <thead>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{!!$fournisseur->name!!}</td>
                    <td>{!!$fournisseur->email!!} </td>
                    <td><form method="POST" action="{{route('validateFournisseur', $fournisseur->id)}}" onsubmit="confirmValidationU(event)">
                       @method("PATCH")
                       <button type="submit" >Valider </button>
                       </form> </td>
                       <td class="primary">
                    <a href="#" class="details-link" data-id="{{ $fournisseur->id }}">Détails </a>
                    </td>

                </tr>
                <div id="modal2{{ $fournisseur->id }}" class="modal2">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1>{{ $fournisseur->name }}</h1>
                            <h4>{{ $fournisseur->email }}</h4> 
                            <h4>{{$fournisseur->adress}}</h4>
                            <h4>Attachement</h4>
                            <img src='/public/attachements/{{$fournisseur->attachement}}' alt="aucun attachement"/>
                        </div>
                    </div>


                @endforeach
            </tbody>
           </table> 
           @else
            <div class="vide">
                 <p>Aucune demande..</p>
            </div>
   
    @endif
        </div>

    </div>
    <div class="tab-content" id="maintenanciers-tab-content">
    <div class="recent-orders">
           <h2>Maintenancier </h2>
           @if(!empty($maintenanciers))
           <table>
            <thead>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($maintenanciers as $maintenancier)
                <tr>
                    <td>{!!$maintenancier->name!!}</td>
                    <td>{!!$maintenancier->email!!} </td>
                    <td><form  method="POST" action="{{route('validateMaintenancier', $maintenancier->id)}}" onsubmit="confirmValidationU(event)">
                       @method("PATCH")
                       <button class="action-btn" type="submit" >Valider </button>
                       </form> </td>
                       <td class="primary">
                    <a href="#" class="details-link" data-id="{{ $maintenancier->id }}">Détails </a>
                    </td>
                </tr>
                <div id="modal3{{ $maintenancier->id }}" class="modal3">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                           <h1>{{ $maintenancier->name }}</h1>
                            <h4>{{ $maintenancier->email }}</h4> 
                            <h4>{{$maintenancier->adress}}</h4>
                            <h4>Attachement</h4>
                            <img src='/public/attachements/{{$maintenancier->attachement}}' alt="aucun attachement"/> 
                        </div>
                    </div>
                @endforeach
            </tbody>
           </table> 
           @else
                <div class="vide">
                    <p>Aucune demande..</p>
                </div>
    
    @endif
        </div>
    </div>
</div>





    </main>
    @endsection
    </html>
















        
        
