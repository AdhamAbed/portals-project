<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsGoalsTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['goal_title','goal_description'];
}
