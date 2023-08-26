<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipement extends Model
{
    public function cabinet(){
        return $this->belongsToMany(Cabinet::class,'equipement_cabinet','equipement_id','cabinet_id')
        ->withPivot('etat');
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function marque(){
        return $this->belongsTo(Type::class);
    }
    public function produits(){
        return $this-> hasMany(Produit::class);
    }
}
