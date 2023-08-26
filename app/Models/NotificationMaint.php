<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class NotificationMaint extends Model
{
    protected $fillable=['sujet','content'];
    public function maintenancier(){
        return $this->belongsTo(Fournisseur::class);
    }
}
