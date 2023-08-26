@extends('layouts.masterF')
@section('title')
Produit
@endsection
@section('content')
        @section('name')
        {{$fournisseur->name}}
        @endsection
        @section('email')
        {{$fournisseur->email}}
        @endsection


        <main class="main-content">
    <h2>Commandes</h2>
    <div class="tabs">
    <label class="tab-label active" data-tab="gerants-tab">Commande Cabinet</label>
    <label class="tab-label" data-tab="fournisseurs-tab">Commande Maintenancier</label>

    <div class="tab-content active" id="gerants-tab-content">
    <div class="recent-orders">
    <table>
        <!-- Table header -->
        <tr>
            <th class="column-cabinet">Cabinet</th>
            <th class="column-produit">Produit</th>
            <th class="column-quantite">Quantité</th>
            <th class="column-totale">Totale</th>
        </tr>
        <!-- Table rows -->
        @php
            $currentCabinet = null;
            $totalCabinet = 0;
        @endphp
        @foreach($commandes as $commande)
            @php
                $nom_cabinet = DB::table('cabinets')->where('id', $commande->cabinet_id)->value('name');
                $nom_produit = DB::table('produits')->where('id', $commande->produit_id)->value('name');
                $prix_produit = DB::table('produit_fournisseur')
                    ->where('produit_id', $commande->produit_id)
                    ->where('fournisseur_id', $commande->fournisseur_id)->value('prix');

                // Accumulate the total for the current cabinet
                $totalCabinet += ($prix_produit * $commande->qte);
            @endphp
            <!-- Commande details -->
            <tr>
                <td>{{$nom_cabinet}}</td>
                <td>{{$nom_produit}}</td>
                <td>{{$commande->qte}}</td>
                <td>{{$prix_produit * $commande->qte}}</td>
            </tr>
            <!-- Validation and Suppression buttons -->
            @if(!$loop->last)
                @php
                    $nextCommande = $commandes[$loop->index + 1];
                @endphp
                @if($commande->cabinet_id != $nextCommande->cabinet_id)
                    <!-- Show the total for the current cabinet -->
                    <tr>
                        <td colspan="3"></td>
                        <td>Total: {{$totalCabinet}}</td>
                    </tr>
                    <!-- Reset the total for the next cabinet -->
                    @php
                        $totalCabinet = 0;
                    @endphp
                    <!-- Validation and Suppression forms -->
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <form method="POST" action="{{route('validerCommande')}}" onsubmit="confirmValidationC(event)">
                                @csrf
                                @method("PATCH")
                                <input type="hidden" name="cabinet" value="{{$commande->cabinet_id}}">
                                <input type="hidden" name="date" value="{{\Carbon\Carbon::now()}}">
                                <button  type="submit" >Valider</button>
                            </form>

                        </td>
                        <td>
                        <form method="POST" action="{{route('supprimerCommande')}}">
                            @method("DELETE")
                            @csrf
                            <input type="hidden" name="cabinet" value="{{$commande->cabinet_id}}">
                            <button  type="submit" onclick="confirmDeleteC(event)">Supprimer</button>
                            <input type="hidden" name="date" value="{{\Carbon\Carbon::now()}}">
                         
                        </form>
                        </td>
                    </tr>
                @endif
            @else
                <!-- Show the total for the last cabinet -->
                <tr>
                    <td colspan="3"></td>
                    <td>Total: {{$totalCabinet}}</td>
                </tr>
                <!-- Validation and Suppression forms -->
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <form method="POST" action="{{route('validerCommande')}}" onsubmit="confirmValidationC(event)">
                            @csrf
                            @method("PATCH")
                            <input type="hidden" name="cabinet" value="{{$commande->cabinet_id}}">
                            <input type="hidden" name="date" value="{{\Carbon\Carbon::now()}}">
                            <button type="submit" >Valider</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{route('supprimerCommande')}}">
                            @method("DELETE")
                            @csrf
                            <input type="hidden" name="cabinet" value="{{$commande->cabinet_id}}">
                            <button  type="submit" onclick="confirmDeleteC(event)">Supprimer</button>
                            <input type="hidden" name="date" value="{{\Carbon\Carbon::now()}}">
                         
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
</div>


<div class="tab-content " id="fournisseurs-tab-content">
    <div class="recent-orders">
    <table>
        <tr>
            <th class="column-cabinet">Maintenancier</th>
            <th class="column-produit">Produit</th>
            <th class="column-quantite">Quantité</th>
            <th class="column-totale">Totale</th>
        </tr>

        @php
            $currentMaint = null;
            $totalcommandeM = 0;
        @endphp
        @foreach($commandesMaint as $commandeMaint)
            @php
                $nom_maint= DB::table('maintenanciers')->where('id',$commandeMaint->maintenancier_id)->value('name');
                $nom_produit= DB::table('produits')->where('id',$commandeMaint->produit_id)->value('name');
                $prix_produit= DB::table('produit_fournisseur')
                    ->where('produit_id', $commandeMaint->produit_id)
                    ->where('fournisseur_id',$commandeMaint->fournisseur_id)->value('prix');
                    $totalcommandeM += ($prix_produit * $commandeMaint->qte);
            @endphp
            <tr>
                <td>{{$nom_maint}}</td>
                <td>{{$nom_produit}}</td>
                <td>{{$commandeMaint->qte}}</td>
                <td>{{$prix_produit * $commandeMaint->qte}}</td>
            </tr>
            @if(!$loop->last)
                @php
                    $nextCommande = $commandesMaint[$loop->index + 1];
                @endphp
                @if($commandeMaint->maint_id !=$nextCommande->maint_id )
                     <!-- Show the total for the current cabinet -->
                     <tr>
                        <td colspan="3"></td>
                        <td>Total: {{$totalcommandeM}}</td>
                    </tr>
                    <!-- Reset the total for the next cabinet -->
                    @php
                        $totalcommandeM = 0;
                    @endphp
                    <!-- Validation and Suppression forms -->
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            <form method="POST" action="{{route('validerCommandeMaint')}}" onsubmit="confirmValidationC(event)">
                                @csrf
                                @method("PATCH")
                                <input type="hidden" id="maint" name="maint" value="{{$commande->maint_id}}">
                                <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now()}}">
                                <button type="submit">Valider</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('supprimerCommandeMaint')}}">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" id="maint" name="maint" value="{{$commande->maint_id}}">
                                <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now()}}">
                                <button type="submit" onclick="confirmDeleteC(event)">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @else
                 <!-- Show the total for the last cabinet -->
                 <tr>
                    <td colspan="3"></td>
                    <td>Total: {{$totalcommandeM}}</td>
                </tr>
                <!-- Validation and Suppression forms -->
                <tr>
                    <td colspan="2"></td>
                        <td>
                            <form method="POST" action="{{route('validerCommandeMaint')}}" onsubmit="confirmValidationC(event)">
                                @csrf
                                @method("PATCH")
                                <input type="hidden" id="maint" name="maint" value="{{$commandeMaint->maintenancier_id}}">
                                <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now()}}">
                                <button type="submit">Valider</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('supprimerCommandeMaint')}}">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" id="maint" name="maint" value="{{$commandeMaint->maintenancier_id}}">
                                <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now()}}">
                                <button type="submit" onclick="confirmDeleteC(event)">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endif    
        @endforeach
    </table>
    </div>
</div>
</div>

</main>

@endsection


