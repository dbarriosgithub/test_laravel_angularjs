<?php

namespace App\person;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primarykey = ['id'];
    protected $table  = 'cities';
    protected $fillable = ['name'];
    protected $guarded=['id'];
}
  