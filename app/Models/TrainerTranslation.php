<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerTranslation extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'subDescription', 'specialize'];
}
