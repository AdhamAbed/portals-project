<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsCertificatesImage extends Model
{

    use SoftDeletes;
    protected $table = 'about_us_certificates_images';
    protected $fillable = ['image' ,'page_id'];
    protected $hidden = ['updated_at', 'deleted_at'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id')->withTrashed();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/pages/' . $value);
    }
}
