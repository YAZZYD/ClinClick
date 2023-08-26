<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    public function equipements(){
        return $this->hasMany(Equipement::class);
    }

    public function maintenanciers(){
        return $this->belongsToMany(Maintenancier::class,'competence','type_id','maintenancier_id');
    }
}
