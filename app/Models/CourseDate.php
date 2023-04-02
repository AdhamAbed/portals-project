<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseDate extends Model
{
    use SoftDeletes;
    protected $table = 'course_dates';
    protected $hidden = ['updated_at', 'deleted_at'];

    protected $fillable = ['course_id' , 'time_from'  , 'time_to' , 'date'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }
}
