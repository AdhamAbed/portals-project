<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

use App\Models\RateStandard;

class Rate extends Model
{

    public $translatedAttributes = ['name'];

    use SoftDeletes,Translatable;
    protected $table = 'rates';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    protected $with = ['rates_standards'];


    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

    public function rates_standards()
    {
        return $this->hasMany(RateStandard::class);
    }
    

}
