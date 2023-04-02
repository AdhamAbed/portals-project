<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseComments extends Model
{

    use SoftDeletes;

    protected $table = 'course_comments';
    protected $hidden = ['updated_at', 'deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFileAttribute($value)
    {
        return url('uploads/courses/comments/' . $value);
    }


}
