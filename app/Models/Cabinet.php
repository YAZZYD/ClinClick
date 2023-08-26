<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabinet extends Model
{
    protected $fillable=[
        'name', 'adress'
    ];
    protected $casts=[
    ];
    public function gerant(){
        return $this->belongsTo(Gerant::class);
    }
    public function equipements(){
        return $this->belongsToMany(Equipement::class,'equipement_cabinet','cabinet_id','equipement_id')
        ->withPivot('etat');
    }

}
