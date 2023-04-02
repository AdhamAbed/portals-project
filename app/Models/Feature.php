<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
     use SoftDeletes,Translatable;
    public $table = 'features';
    public $translatedAttributes = ['title' , 'description'];

    protected $fillable = [
        'color','status'
    ];


    protected $hidden = ['updated_at', 'deleted_at', 'translations'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


}
