<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminTranslation extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'summary', 'details'];
}
