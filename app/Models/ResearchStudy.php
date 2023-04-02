<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use app\Admin;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Association;


use app\User;

class ResearchStudy extends Model
{
    
    use SoftDeletes,Translatable;
    public $table = 'research_studies';
    public $translatedAttributes = ['title', 'summary', 'details', 'writer', 'study_sample'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];
    
    protected $appends = ['photos'];

    
    public function association()
    {
        return $this->belongsTo(Admin::class)->withTrashed();
    }


    public function getPhotosAttribute()
    {
        $photos = Photo::where('attachmentable_id', $this->id)->where('attachmentable_type', 'App\Models\ResearchStudy')->get();
        return $photos;
    }

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }
    
    public function getImageAttribute($value)
    {
        return url('uploads/research_studies/' . $value);
    }
    
    
    public function getFileAttribute($value)
    {
        return url('uploads/research_studies/' . $value);
    }
    


}
