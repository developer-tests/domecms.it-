<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\ModelLog;
//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    
  use ModelLog;
  protected $with=['roles'];
  protected $guarded = [];   
  protected $table = 'users';
  protected $fillable = ['password',
                        'name',
                        'last_name',
                        'date_of_birth',
                        'note',
                        'cf',
                        'sex',
                        'birth_city',
                        'province_birth',
                        'nation_birth',
                        'city_residence',
                        'province_residence'
      ];
//  protected $tagName = 'User';
  
  public function roles(){
      return $this->hasMany(Role::class,'id','role_id');
  }
  public function cm(){
    return $this->belongsTo(SituationCm::class,'user_id','id');
  }
   public function ticket(){
    return $this->hasMany(Ticket::class,'from_user','id');
  }
 public function phyTest(){
    return $this->hasMany(PhysicalBasicTest::class,'user_id','id'); 
 }
}
