<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Admin;
use App\Models\Service;
use App\Models\Order;
use App\Models\ConsultationCategory;

class Consultation extends Model
{


    use SoftDeletes;
    protected $table = 'consultations';
    protected $fillable = ['views_count', 'read'];
    protected $hidden = ['updated_at', 'deleted_at'];
    

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }

    
    public function category()
    {
        return $this->belongsTo(ConsultationCategory::class, 'consultation_category_id')->withTrashed();
    }


}
