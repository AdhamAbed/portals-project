<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectGallery extends Model
{
    use SoftDeletes;
    protected $table = 'project_galleries';
    protected $fillable = ['image' ,'project_id'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public function project()
    {
        return $this->belongsTo(project::class, 'project_id')->withTrashed();
    }

    public function getImageAttribute($value)
    {
        return url('uploads/projects/' . $value);
    }

}
