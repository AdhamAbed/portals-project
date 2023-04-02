<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Category;
use App\Models\Photo;

use app\User;

class Post extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'posts';
    public $translatedAttributes = ['title', 'summary', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    
    protected $appends = ['photos'];


    public function getPhotosAttribute()
    {
        $photos = Photo::where('attachmentable_id', $this->id)->where('attachmentable_type', 'App\Models\Post')->get();
        return $photos;
    }

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    public function getImageAttribute($value)
    {
        return url('uploads/posts/' . $value);
    }
    
    
    public function getVideoAttribute($value)
    {
        return url('uploads/posts/' . $value);
    }
    


}
