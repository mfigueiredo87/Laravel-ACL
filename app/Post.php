<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //relacionamento para com a tabela usuario 
    public function user(){
        return $this->belongsTo(User::class);//belong faz o relacionamento de muitos para um
        
    }
}
