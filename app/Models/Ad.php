<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{

    use SoftDeletes,Translatable;
    protected $table = 'ads';
    public $translatedAttributes = ['name', 'details'];
    protected $fillable = ['image', 'url', 'status'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'translations'];
    
    
    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }


    public function getImageAttribute($value)
    {
        return url('uploads/ads/' . $value);
    }



    public function getVideoUrlAttribute($value)
    {
        return url('uploads/ads/' . $value);
    }



}
