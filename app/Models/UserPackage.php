<?php

namespace App\Models;
use App\User;
use App\Models\Package;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPackage extends Model
{
    
    use SoftDeletes;
    protected $table = 'users_packages';
    protected $fillable = ['user_id', 'package_id', 'expired_date'];
    protected $hidden = ['updated_at', 'deleted_at'];
    protected $with = ['package'];                       

    public function package()
    {
        return $this->belongsTo(Package::class)->withTrashed();
    }
    
    
    public function getContractFileAttribute($value)
    {
        return url('uploads/users_contracts/' . $value);
    }


}