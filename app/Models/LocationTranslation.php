<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['name' ,'country_name','city_name' ,'description','location_id','locale'];
}
