<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationFournisseur extends Model
{
    protected $fillable=['sujet','content'];
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
}
