<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    public $translatedAttributes = ['name'];

    use SoftDeletes,Translatable;
    protected $table = 'branches';
    protected $fillable = ['email' , 'mobile' , 'fax' , 'site_url' , 'status'];
    protected $hidden = ['updated_at', 'deleted_at','translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

}
