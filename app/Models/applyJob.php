<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class applyJob extends Model
{
    use SoftDeletes;
    protected $table = 'apply_jobs';
    protected $fillable = ['views_count', 'read','name', 'email','cv','question',
                            'details','answer', 'answer_by','status',];
    protected $hidden = ['updated_at', 'deleted_at'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getCvAttribute($value)
    {
        return url('uploads/careers/' . $value);
    }


}
