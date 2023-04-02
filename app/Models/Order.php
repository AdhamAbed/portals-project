<?php

namespace App\Models;

use App\User;
use App\Admin;
use App\Models\OrderCampaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coupon;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Chat;
use App\Models\Category;


class Order extends Model
{
    
    use SoftDeletes;
    protected $table = 'orders';
    protected $hidden = ['updated_at', 'deleted_at'];

    protected $with = ['user', 'employee', 'service', 'payment_method', 'chat'];

    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }


    public function employee()
    {
        return $this->belongsTo(Admin::class, 'employee_id')->withTrashed();
    }


    
    
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class)->withTrashed();
    }



    public function chat()
    {
        return $this->hasOne(Chat::class);
    }



}
