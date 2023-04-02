<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes,Translatable;
    public $table = 'units';
    public $translatedAttributes = ['title', 'details'];

    protected $hidden = ['updated_at','deleted_at', 'translations'];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

}
