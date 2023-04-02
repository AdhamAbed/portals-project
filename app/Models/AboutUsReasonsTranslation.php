<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsReasonsTranslation extends Model
{
    use SoftDeletes;
    protected $fillable = ['reason_title','reason_description'];
}
