<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Association extends Model
{
  protected $with=['assoc_data'];  
  protected $table = 'association';
  
  public function user(){
      return $this->hasOne(User::class,'id','user_id');
  }
  public function assoc_data(){
      return $this->hasOne(AssocData::class,'association_id','id');
  }
  
}
