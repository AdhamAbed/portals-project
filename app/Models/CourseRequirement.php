<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRequirement extends Model
{
    public $translatedAttributes = ['requirement_title'];

    use SoftDeletes,Translatable;
    protected $table = 'course_requirements';
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id')->withTrashed();
    }
}
