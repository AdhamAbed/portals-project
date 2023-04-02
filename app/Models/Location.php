<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    public $translatedAttributes = ['name','country_name','city_name','description'];

    use SoftDeletes,Translatable;
    protected $table = 'locations';
//    protected $fillable = ['course_category_id' , 'course_id' , 'course_duration' , 'course_cost' , 'branch_id'];
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
