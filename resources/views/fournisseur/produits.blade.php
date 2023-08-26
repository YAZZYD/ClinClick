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
    <h1>Produits</h1>
        <div class="bar">
            <button class="success button-corner" id="addProductButton1">Ajouter </button>
        </div>
    <div class="produits">
        @if($fournisseur->produits->count() > 0)
        @foreach($fournisseur->produits as $produit)
        <div class="produit">
            <img src="{{asset('storage/produit_uploads/'.$produit->pivot->image)}}" alt="Produit1" class="product-image">
            <h3 class="product-title">{{$produit->name}}</h3>
            <h5> {{$produit->categorie->name}}</h5>
            <p class="product-type">{{$produit->type}}</p>
            <p class="product-sales">Quantité: {{$produit->pivot->qte}}</p>
            <p class="product-price">Prix: {{$produit->pivot->prix}}DZD</p>
            <a href="#"><button class="modify-button" id="ModifyProductButton">Modifier</button></a>
            <br>
            <form method="POST" action="{{route('supprimerProduit',$produit->id)}}" id="deleteForm">
            @csrf 
            @method("DELETE")  
            <button type="submite" onclick="confirmDelete(event)">Supprimer</button>
            </form>
        </div>
        <!--Modifier produit modal-->
        <div id="modal1" class="modal1">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Modifier Produit</h2>
                <h5>Nom: {{$produit->name}}</h5>
                <h5>Type: {{$produit->type}}</h5>
                <form method="POST" action="{{route('modifierProduit',$produit->id)}}">
                    @csrf
                    @method("PATCH")
                    <label for="qte">Quantité</label><br>
                    <input type="number" name="qte" id="qte"><br>
                    <label for="prix">Prix</label><br>
                    <input type="number" name="prix" id="prix"><br>
                <button type="submit">Appliquer</button>
                </form>
            </div>
        </div>
    @endforeach
    </div> 
@else
<div class="vide">
    <p >Vous n'avez aucun produit ici.</p>
</div>
@endif



<!--Ajouter produit modal-->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Ajouter un produit</h2>
        <form method="POST" action="{{route('ajoutProduit')}}" enctype="multipart/form-data">
        @csrf
        <label for="name" class="details">{{__('Nom de produit')}}</label><br>
        <input type="text" id="name" name="name" placeholder="Entrer le nom du produit"><br>
        <label for="qte" class="details">{{__('Quantité')}}</label><br>
        <input type="number" id="qte" name="qte" placeholder="Entrer la quantité de produit"><br>
        <label for="prix" class="details">{{__('Prix')}}</label><br>
        <input type="number" id="prix"name="prix" placeholder="Entrer le prix du produit"><br>
        <label for="categorie" class="details">{{__('Catégorie')}}</label><br>
        <input type="text" id="categorie" name="categorie" placeholder="Entrer la catégorie du produit"><br>

        <label for="type" class="details">{{__('Type')}}</label><br>
        <select id="type" name="type">
        <option value="consommable">consommable</option>
        <option value="non consommable">non consommable</option>
        <option value="piece">piece</option>
        </select><br>

        <label for="image" class="details">{{__('Importer Image ')}}</label>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg">
        <br>
        <button class="success button-modal" type="submit">ajouter Produit</button>
                    </form>
    </div>
</div>



@if($fournisseur->produits->count() > 0)
<!--Modifier produit modal-->
<div id="modal1" class="modal1">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modifier Produit</h2>
        <h5>Nom: {{$produit->name}}</h5>
        <h5>Type: {{$produit->type}}</h5>
        <form method="POST" action="{{route('modifierProduit',$produit->id)}}">
            @csrf
            @method("PATCH")
            <label for="qte">Quantité</label><br>
            <input type="number" name="qte" id="qte"><br>
            <label for="prix">Prix</label><br>
            <input type="number" name="prix" id="prix"><br>
           <button type="submit">Appliquer</button>
        </form>
    </div>
    

</div>
@endif

    </main>
@endsection


