<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseQuestionTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['question','answer'];
}
