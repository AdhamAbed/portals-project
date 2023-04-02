<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidCourse extends Model
{
    use SoftDeletes;
    protected $table = 'paid_courses';
    protected $fillable = ['user_id', 'course_id' , 'price'];
    protected $hidden = ['updated_at', 'deleted_at'];

    protected $with = ['user','course'];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }



}
