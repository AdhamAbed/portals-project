<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryTranslation extends Model
{

    use SoftDeletes;
    protected $fillable = ['name'];
    protected $hidden = ['updated_at', 'deleted_at'];

}
