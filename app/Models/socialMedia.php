<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class socialMedia extends Model
{
    use SoftDeletes;
    public $table = 'social_media';
    public $fillable = ['name', 'url' ,'icon'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];


//    public function scopeActive($query)
//    {
//        return $query->where('status', 'active');
//    }


}
