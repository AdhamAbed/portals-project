<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseQuestion extends Model
{
    use SoftDeletes,Translatable;

    public $translatedAttributes = ['question' , 'answer'];


    protected $table = 'course_questions';
    protected $hidden = ['updated_at', 'deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }
}
