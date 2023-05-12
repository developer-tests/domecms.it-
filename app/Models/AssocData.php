<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AssocData extends Model
{
  
  protected $table = 'association_data';    
  
  public function cm(){
    return $this->belongsTo(Association::class,'id','association_id');
  }
}
