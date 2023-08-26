@extends('layouts.masterA')
@section('title')
utilisateurs
@endsection
@section('content')
<main class="main-content">
        <h1>Utilisateurs</h1>
   
        <div class="tabs">
    <label class="tab-label active" data-tab="gerants-tab">Gérants</label>
    <label class="tab-label" data-tab="fournisseurs-tab">Fournisseurs</label>
    <label class="tab-label" data-tab="maintenanciers-tab">Maintenanciers</label>

    <div class="tab-content active" id="gerants-tab-content">
    <div class="recent-orders">
           <h2>Gérants  </h2>
           <table>
            <thead>
                <th>Nom</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($gerants as $gerant)
                <tr>
                    <td>{!!$gerant->name!!}</td>
                    <td>{!!$gerant->email!!} </td>
                    <td><form method="POST" action="{{route('suspendGerant', $gerant->id)}}">
                       @method("PATCH")
                       @csrf
                       <button class="warning" type="submit">Suspender </button>
                       </form> </td>
                    <td class="primary">Details </td>
                </tr>
                @endforeach
            </tbody>
           </table> 
        </div>
    </div>
    <div class="tab-content" id="fournisseurs-tab-content">
    <div class="recent-orders">
           <h2>Fournissuer </h2>
           <table>
            <thead>
                <th>Nom</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{!!$fournisseur->name!!}</td>
                    <td>{!!$fournisseur->email!!} </td>
                    <td><form method="POST" action="{{route('suspendFournisseur', $fournisseur->id)}}">
                       @method("PATCH")
                       @csrf
                       <button class="warning" type="submit">Suspender </button>
                       </form> </td>
                    <td class="primary">Details </td>
                </tr>
                @endforeach
            </tbody>
           </table> 
        </div>

    </div>
    <div class="tab-content" id="maintenanciers-tab-content">
    <div class="recent-orders">
           <h2>Maintenancier </h2>
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
                    <td><form method="POST" action="{{route('suspendMaintenancier', $maintenancier->id)}}">
                       @method("PATCH")
                       @csrf
                      <button class="warning" type="submit">Suspender </button>
                       </form> </td>
                    <td class="primary">Details </td>
                </tr>
                @endforeach
            </tbody>
           </table> 
        </div>
    </div>
</div>

    </main>
@endsection