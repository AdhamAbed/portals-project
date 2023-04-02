<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInvoice extends Model
{
    
    use SoftDeletes;
    protected $table = 'users_invoices';
    protected $fillable = ['user_id', 'file'];
    protected $hidden = ['updated_at', 'deleted_at'];


    public function getFileAttribute($value)
    {
        return url('uploads/users_invoices/' . $value);
    }

}