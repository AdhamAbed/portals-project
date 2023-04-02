<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursesContent extends Model
{
   public $translatedAttributes = ['content_title','content_description'];

    use SoftDeletes,Translatable;
    protected $table = 'courses_contents';
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id')->withTrashed();
    }
}
