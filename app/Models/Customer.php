<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes,Translatable;
    public $table = 'customers';
    public $translatedAttributes = ['name'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getImageAttribute($value)
    {
        return url('uploads/customers/' . $value);
    }
}
