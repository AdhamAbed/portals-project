<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $table = 'permissions';
    protected $hidden = ['updated_at', 'deleted_at'];

    public function getChildsAttribute()
    {
        return Permission::where('parent_id', $this->id)->get();
    }
    
}
