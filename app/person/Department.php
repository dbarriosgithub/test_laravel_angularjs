<?php

namespace App\person;

use Illuminate\Database\Eloquent\Model;
use App\person\Country;

class Department extends Model
{
    
    protected $primarykey = ['id'];
    protected $table  = 'departments';
    protected $fillable = ['name','country_id'];
    protected $guarded=['id'];

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }
}
