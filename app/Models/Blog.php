<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    public $translatedAttributes = ['title' , 'description' , 'subdescription' , 'author'];

    use SoftDeletes,Translatable;
    protected $table = 'blogs';
    protected $fillable = ['date' , 'image' , 'status'];
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    protected $appends = ['photos'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getPhotosAttribute()
    {
        $photos = BlogGallery::where('blog_id', $this->id)->get();
        return $photos;
    }


    public function getImageAttribute($value)
    {
        return url('uploads/blogs/' . $value);
    }
}
