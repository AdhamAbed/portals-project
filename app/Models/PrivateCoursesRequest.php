<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivateCoursesRequest extends Model
{

    use SoftDeletes;
    public $table = 'private_courses_requests';

    protected $fillable = [
        'name', 'company', 'email', 'location','mobile' ,'details','status','read',
        'replay'
    ];

    protected $hidden = ['updated_at', 'deleted_at', 'translations'];



    public function getImageAttribute($value)
    {
        return url('uploads/schedule_courses/' . $value);
    }


}
