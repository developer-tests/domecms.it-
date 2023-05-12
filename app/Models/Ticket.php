<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Ticket extends Model
{
  use HasTranslations;
    
    public $translatable = ['msg'];
  public function user(){
    return $this->belongsTo(User::class,'from_user','id');
  }
  
}
