<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class Country extends Model
{

    use SoftDeletes,Translatable;
    protected $table = 'countries';
    public $translatedAttributes = ['name'];
    protected $fillable = ['status'];
    protected $hidden = ['updated_at', 'deleted_at', 'translations'];

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

}