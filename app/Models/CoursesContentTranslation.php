<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursesContentTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['content_title','content_description'];
}
