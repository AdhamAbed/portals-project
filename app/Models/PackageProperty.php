<?php

namespace App\Models;

use App\Models\Package;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class PackageProperty extends Model
{

    public $translatedAttributes = ['title'];

    use SoftDeletes,Translatable;
    protected $table = 'packages_properties';
    protected $hidden = ['updated_at', 'deleted_at','translations'];


    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }


    public function package()
    {
        return $this->belongsTo(Package::class)->withTrashed();
    }

}
