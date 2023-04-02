<?php

namespace App\Models;

use App\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleCourse extends Model
{

    public $translatedAttributes = ['notes'];

    use SoftDeletes,Translatable;
    public $table = 'schedule_courses';

    protected $fillable = ['course_category_id', 'course_id', 'location_id', 'branch_id','trainer_id' ,'course_date',
        'course_duration', 'course_cost','course_duration_type','course_cost_currency','image','status'
    ];

    protected $hidden = ['updated_at', 'deleted_at', 'translations'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id')->withTrashed();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id')->withTrashed();
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->withTrashed();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/schedule_courses/' . $value);
    }


}
