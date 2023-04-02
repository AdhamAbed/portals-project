<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

use App\Admin;
use App\Models\Service;
use App\Models\Order;


class ConsultationCategory extends Model
{

    public $translatedAttributes = ['name' , 'description','sub_description'];

    use SoftDeletes,Translatable;
    protected $table = 'consultations_categories';
    protected $hidden = ['updated_at', 'deleted_at','translations'];
    // protected $appends = ['services_count'];

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }


    public function getImageAttribute($value)
    {
        return url('uploads/consultations_categories/' . $value);
    }
    public function getHeaderImageAttribute($value)
    {
        return url('uploads/consultations_categories/' . $value);
    }


}
