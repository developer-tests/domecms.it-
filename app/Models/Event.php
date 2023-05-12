<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelLog;

class Event extends Model
{
  use ModelLog;
  protected $fillable = [
                    'name',
  'operator_id',
  'state',
  'start_date',
  'end_date',
  'start_time',
  'end_time',
  'note',
  'description',
  'subscriber',
  'weekly_pay',
  'monthly_pay',
  'bimonthly_pay',
  'quaterly_pay',
  'annual_pay',
  'sixmonth_pay',
  'tantum_pay',
  'family_discount',
  'active' ,
  'suspension' ,
  'old_event_id' 
  ];
   public function physicaltest(){
      return $this->hasOne(PhysicalBasicTest::class,'event_id','id');
  }
  
  public function parent()
{
    return $this->belongsTo(self::class, 'old_event_id');
}

public function children()
{
    return $this->hasMany(self::class, 'id');
}

public function event_register()
{
    return $this->hasMany(EventRegister::class, 'event_id','id');
}
}
