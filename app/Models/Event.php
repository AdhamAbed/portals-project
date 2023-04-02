<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use app\User;
use app\Admin;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Association;


class Event extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'events';
    public $translatedAttributes = ['title', 'summary', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    
    protected $appends = ['photos'];


    public function association()
    {
        return $this->belongsTo(Admin::class)->withTrashed();
    }
    

    public function getPhotosAttribute()
    {
        $photos = Photo::where('attachmentable_id', $this->id)->where('attachmentable_type', 'App\Models\Event')->get();
        return $photos;
    }

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    public function getImageAttribute($value)
    {
        return url('uploads/events/' . $value);
    }
    
    
    public function getVideoAttribute($value)
    {
        return url('uploads/events/' . $value);
    }
    


}
