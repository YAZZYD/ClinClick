<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Fournisseur extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $guard= 'fournisseur';

    protected $fillable=[
        'name',
        'email',
        'password',
        'adress',
        'tel',
        'attachement',
    ];

    protected $hidden=[
        'password',
        'remember_token',
    ];

    protected $with=[
        'produits',
    ];

    public static function rules(){
        return  [ 'first_name' => ['required', 'string', 'max:255'],
                  'last_name' => ['required', 'string', 'max:255'],
                  'email' => ['required', 'string', 'email', 'max:255', 'unique:gerants'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
                  'tel'=>['required','unique:gerants','numeric'],
                  'file'=> ['image'],
                 ];
    }


    //Relations

    public function produits(){
        return $this->belongsToMany(Produit::class,'produit_fournisseur','fournisseur_id','produit_id')->withPivot('image','prix','qte');
    }

    public function notifications(){
        return $this->hasMany(NotificationFournisseur::class);
    }
}
