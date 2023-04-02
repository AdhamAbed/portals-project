<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes,Translatable;
    public $table = 'lessons';
    protected $fillable = ['unit_id','file','status'];
    public $translatedAttributes = ['title', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    protected $appends = ['is_completed'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFileAttribute($value)
    {
        if($value){
            return url('uploads/lessons/' . $value);
        }
    }


}
