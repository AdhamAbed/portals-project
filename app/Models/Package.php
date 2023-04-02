<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

use App\Models\PackageProperty;


class Package extends Model
{

    public $translatedAttributes = ['title', 'details'];

    use SoftDeletes,Translatable;
    protected $table = 'packages';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    protected $with = ['packages_properties'];


    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    
    public function packages_properties()
    {
        return $this->hasMany(PackageProperty::class);
    }

    
    public function getImageAttribute($value)
    {
        if($value){
            return url('uploads/packages/' . $value);
        }
    }


    public function getFileAttribute($value)
    {
        if($value){
            return url('uploads/packages/' . $value);
        }
    }




}
