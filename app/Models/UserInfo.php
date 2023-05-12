<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserInfo extends Model
{

  public function phy(){
      return $this->hasOne(PhysicalBasicTest::class,'id','phy_id');
  }
  
}
