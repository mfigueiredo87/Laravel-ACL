<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //funcoes que estao ligadas as permissoes
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

}
