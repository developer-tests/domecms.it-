<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituationCm extends Model
{
    public function user(){
        return $this->hasMany(User::class,'id','user_id');
    }

}
