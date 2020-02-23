<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public $table = 'provincia';
    public $primaryKey = 'id_provincia';
    public $timestamps = false;
    public $guarded = [];

    public function destinos(){
        return $this->hasMany("App\Destino","id_provincia");
    }

}
