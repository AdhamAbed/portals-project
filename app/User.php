<?php

namespace App;

use App\Models\Country;
use App\Models\Course;


use App\Models\PaidCourse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User  extends Authenticatable implements MustVerifyEmail
{

    use Notifiable,HasApiTokens,SoftDeletes;
    protected $hidden = ['password', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'image', 'google_id' ,'email', 'gender', 'job_title', 'company_name', 'phone', 'country_id',
        'type', 'status',
    ];



     public function country()
     {
         return $this->belongsTo(Country::class, 'country_id')->withTrashed();
     }


    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function paid_courses()
    {
        return $this->hasMany(PaidCourse::class);
    }


    public function getImageAttribute($value)
    {
        if($value){
            if ($this->google_id != '')
            {
                return $value;
            }else{
                return url('uploads/users/' . $value);
            }
        }
    }







}
