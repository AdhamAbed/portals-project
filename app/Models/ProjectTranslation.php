<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTranslation extends Model
{
    use SoftDeletes;
    protected $fillable =  ['title' , 'description', 'subdescription' , 'customer_name'];
}
