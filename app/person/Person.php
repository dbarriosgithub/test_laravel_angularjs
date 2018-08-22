<?php

namespace App\person;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table='people';
    public $fillable = ['firstName','lastName','phoneNumber','email','address','country_id','department_id','city_id'];

}
