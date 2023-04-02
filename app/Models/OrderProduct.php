<?php

namespace App\Models;

use App\User;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderProduct extends Model
{

  use SoftDeletes;
  protected $table = 'order_products';
  protected $hidden = ['updated_at', 'deleted_at'];
  protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];
  protected $with = ['product'];
  
  
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id')->without(['sizes', 'colors'])->withTrashed();
    }

    public function size()
    {
        return $this->belongsTo(Size::class)->withTrashed();
    }

    public function color()
    {
        return $this->belongsTo(Color::class)->withTrashed();
    }

}
