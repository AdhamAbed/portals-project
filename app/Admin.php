<?php

namespace App;
use App\User;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Country;
use App\Models\City;


use Astrotomic\Translatable\Translatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes, Translatable;
    

    public $translatedAttributes = ['name', 'summary', 'details'];
    protected $fillable = ['name', 'email', 'password', 'mobile', 'image','type']; 
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'];
    // protected $with = ['areas'];
    
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }
    
    

    public function role()
    {
        return $this->belongsTo(Role::class)->withTrashed();
    }


    public function getImageAttribute($value)
    {
        return url('uploads/admins/' . $value);
    }
    
    
    public function getIdImageAttribute($value)
    {
        return url('uploads/admins/' . $value);
    }
    

    public function getAssociationImageAttribute($value)
    {
        if($value){
            return url('uploads/admins/' . $value);
        }
    }



}
