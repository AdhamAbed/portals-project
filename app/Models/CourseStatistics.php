<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStatistics extends Model
{
    use SoftDeletes,Translatable;

    public $translatedAttributes = ['title'];


    protected $table = 'course_statistics';
    protected $fillable = [
        'course_id',
        'count',
        'image',
    ];
    protected $hidden = ['updated_at', 'deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }


    public function getImageAttribute($value)
    {
        return url('uploads/courses/statistics/' . $value);
    }
}
