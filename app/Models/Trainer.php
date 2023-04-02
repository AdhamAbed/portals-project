<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    public $translatedAttributes = ['name' , 'description' , 'subDescription' , 'specialize'];

    use SoftDeletes,Translatable;
    protected $table = 'trainers';
    protected $fillable = ['image'];
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function getTrainerCourseCountAttribute()
    {
        return Course::where('trainer_id', $this->id)->count();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/trainers/' . $value);
    }
}
