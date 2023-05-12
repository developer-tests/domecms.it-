<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Province extends Model
{

    
  public function location(){
    return $this->belongsTo(Location::class,'province_id','id');
  } 
  
}
