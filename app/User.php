<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook', 'twitter', 'instagram', 'avatar', 'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favoritos()
    {
        return $this->belongsToMany("App\Destino", "favoritos", "id_usuario", "id_destino");
    }
    public function idfavoritos()
    {
        $arrayFavoritos = collect($this->favoritos->modelKeys());
        
        return $arrayFavoritos;
    }
    public function comentarios()
    {
        return $this->belongsToMany("App\Destino", "comentarios", "id_usuario", "id_destino")->withPivot("comentario", "puntuacion")->withTimestamps();

    }
    
}
