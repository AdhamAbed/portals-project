<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRequirementTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['requirement_title','course_requirement_id','locale'];
}
