<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $fillable=[
        'name', 'type'
    ];
    protected $casts=[
    ];

    //rules

    public static function rules(){
        return [
            'name' => ['required','string','max:255'],
            'image'=> ['required','image'],
            'qte' => ['required'],
        ];
    }
    //Relations

    public function fournisseurs(){
        return $this->belongsToMany(Fournisseur::class,'produit_fournisseur','produit_id','fournisseur_id')->withPivot('image','qte','prix');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
