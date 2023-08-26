<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    protected $fillable=[
        'cabinet_id',
        'equipement_id',
        'desc',
        'etat',
    ];
    public function equipement(){
        return $this->belongsTo(Equipement::class);
    }

    public function maints(){
        return $this->belongsToMany(Maintenancier::class,'offres','panne_id','maintenancier_id')
        ->withPivot('date','prix','updated_at');
    }
}
