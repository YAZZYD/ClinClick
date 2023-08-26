<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationGerant extends Model
{
    protected $fillable=['sujet','content'];
    public function gerant(){
        return $this->belongsTo(Fournisseur::class);
    }

}
