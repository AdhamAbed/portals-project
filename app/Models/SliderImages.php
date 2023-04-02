<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderImages extends Model
{

    use SoftDeletes,Translatable;

    public $table = 'slider_images';
    public $translatedAttributes = ['title' , 'description'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    protected $fillable = [
        'image', 'section','status'

    ];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getImageAttribute($image)
    {
        return !is_null($image)?url('uploads/sliders/'.$image):null;
    }


}
