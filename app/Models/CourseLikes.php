<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLikes extends Model
{
    use SoftDeletes;
    protected $table = 'course_likes';
    protected $fillable = [
        'user_id',
        'course_id',
        'like',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'course_id');
    }
}
