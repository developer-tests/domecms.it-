<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelLog;

class EventRegister extends Model
{
  use ModelLog;
  protected $table ='event_register';
  
  public function event(){
      return $this->hasOne(Event::class,'id','event_id');
  }
}
