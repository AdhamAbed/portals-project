<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    public $translatedAttributes = ['title' , 'description' , 'subdescription' , 'customer_name'];

    use SoftDeletes,Translatable;
    protected $table = 'projects';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    protected $appends = ['photos'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

//    public function gallery()
//    {
//        return $this->hasMany(ProjectGallery::class);
//    }
    public function getPhotosAttribute()
    {
        $photos = ProjectGallery::where('project_id', $this->id)->get();
        return $photos;
    }


    public function getImageAttribute($value)
    {
        return url('uploads/projects/' . $value);
    }
}
