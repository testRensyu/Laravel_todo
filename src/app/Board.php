<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function replies()
    {
        return $this->hasMany('App\Replie');
    }
    
}
