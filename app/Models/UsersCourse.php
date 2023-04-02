<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersCourse extends Model
{
    use SoftDeletes;
    protected $table = 'users_courses';
    protected $fillable =[ 'user_id' , 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'course_id');
    }

}
