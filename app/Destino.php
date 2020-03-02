<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    public $primaryKey = 'id_destino';
    public $guarded =[];

    public function favoritos()
    {
        return $this->belongsToMany("App\User", "favoritos", "id_destino", "id_usuario");
    }

    public function provincia()
    {
        return $this->belongsTo("App\Provincia", "id_provincia");
    }
    public function comentarios()
    {
        return $this->belongsToMany("App\User", "comentarios", "id_destino", "id_usuario")->withPivot("id_comentario", "comentario", "puntuacion");
    }

    public function getComentariosXdestino()
    {
        return $this->hasMany('App\Comentario', 'id_destino', 'id_destino');
    }

}
