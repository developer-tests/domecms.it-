<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
  use HasTranslations;
    
    public $translatable = ['name'];
    
//    const SELLER_ROLE_ID = "2";
//    const ADMIN_ROLE_ID = "1";
//    const FEUSER_ROLE_ID = "3";
  
    public function user(){
        return $this->belongsTo(User::class,'id','role_id');
    }
}
