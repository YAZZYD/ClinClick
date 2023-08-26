<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Maintenancier extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $guard= 'maintenancier';

    protected $fillable=[
        'name',
        'email',
        'password',
        'adress',
        'tel',
    ];

    protected $hidden=[
        'password',
        'remember_token',
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

    public function competences(){
        return $this->belongsToMany(Type::class,'competence','maintenancier_id','type_id');
    }

    public function notifications(){
        return $this->hasMany(NotificationFournisseur::class);
    }

    public function pannes(){
        return $this->belongsToMany(Panne::class,'offres','maintenancier_id','panne_id')
        ->withPivot('date','prix','updated_at');
    }
}

