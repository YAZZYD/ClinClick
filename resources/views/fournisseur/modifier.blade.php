<h1>profile</h1>
<ul>
<li>{{$fournisseur->name}}</li>
<li>{{$fournisseur->email}}</li>
</ul>

<h2>Modifer Produit</h2>
<h5>Nom: {{$produit->name}}</h5>
<h5>Type: {{$produit->type}}</h5>

<form method="POST" action="{{route('modifierProduit',$produit->id)}}">
    @csrf
    @method("PATCH")
<label for="qte">Quantité </label>
<input type="number" min='1' name="qte" id="qte"><br>
<label for="prix">Prix </label>
<input type="number" min='1' name="prix" id="prix"><br>
<button type="submite">Appliquer</button>
</form>