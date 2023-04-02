<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use app\User;
use app\Admin;
use App\Models\Country;
use App\Models\City;


class Ambassador extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'ambassadors';
    public $translatedAttributes = ['title', 'summary', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }
    
    
    public function association()
    {
        return $this->belongsTo(Admin::class)->withTrashed();
    }
    
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    
    public function getLogoAttribute($value)
    {
        return url('uploads/ambassadors/' . $value);
    }
    
    


}
