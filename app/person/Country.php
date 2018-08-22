<?php

namespace App\person;

use Illuminate\Database\Eloquent\Model;
use App\person\Department;

class Country extends Model
{
   
   protected $primarykey = ['id'];
   protected $table  = 'countries';
   protected $fillable = ['name','code'];
   protected $guarded=['id'];

   public function departments()
   {
   	  return $this->hasMany(Department::class,'department_id');
   }
}
