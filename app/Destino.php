<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    public $primaryKey = 'id_destino';
    public $guarded =[];

    public function provincia(){
        return $this->belongsTo("App\Provincia", "id_provincia");
    }

    public function getComentariosXdestino()
    {
        return $this->hasMany('App\Comentario', 'id_destino', 'id_destino');
    }

}
