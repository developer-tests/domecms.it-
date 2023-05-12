<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PaymentMethod extends Model
{
  use HasTranslations;
    
    public $translatable = ['description'];
  
  
}
