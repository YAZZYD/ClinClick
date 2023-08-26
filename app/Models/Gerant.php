<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Gerant extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $guards='gerant';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public static function rules(){
        return  [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:gerants'],
                // 'password' => ['required', 'string', 'min:8', 'confirmed'],
                'tel'=>['required','unique:gerants','numeric'],
                'file'=> ['image'],
                 ];
    }

    public function cabinet(){
        return $this->hasOne(Cabinet::class);
    }

    public function notifications(){
        return $this->hasMany(NotificationFournisseur::class);
    }
}
