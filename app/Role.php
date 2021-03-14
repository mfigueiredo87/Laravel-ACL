<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //criando metodo que retorna as permissoes
    public function permissions(){
        return $this->belongsToMany(\App\Permission::class);
    }
}
