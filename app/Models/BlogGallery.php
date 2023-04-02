<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogGallery extends Model
{
    use SoftDeletes;
    protected $table = 'blog_galleries';
    protected $fillable = ['image' ,'blog_id'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id')->withTrashed();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/blogs/' . $value);
    }

}
