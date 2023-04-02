<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Category;
use App\Models\Photo;
use App\Models\CourseCategory;

use app\User;

class Course extends Model
{

    use SoftDeletes,Translatable;
    public $table = 'courses';
    protected $fillable = ['views_count','course_category_id','user_id','type','course_language','course_date_time',
        'public_private','image','video','course_link','price','discount','price_after_discount',
        'hours','share_post', 'accept_comments', 'file_type', 'file','status','trainer_id',
        ];
    public $translatedAttributes = ['title', 'summary', 'details'];
    protected $hidden = ['updated_at','deleted_at', 'translations'];

    protected $appends = ['avg_rating' , 'my_courses' , 'favorite'];

    public function scopeActive($query)
    {
       return $query->where('status', 'active');
    }


    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id')->withTrashed();
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id')->withTrashed();
    }

    public function reviews()
    {
        return $this->hasMany(CourseComments::class);
    }
    public function paid_courses()
    {
        return $this->hasMany(PaidCourse::class);
    }

    public function course_statistics()
    {
        return $this->hasMany(CourseStatistics::class);
    }

    public function contents()
    {
        return $this->hasMany(CoursesContent::class);
    }
    public function requirements()
    {
        return $this->hasMany(CourseRequirement::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

//    public function users()
//    {
//        return $this->belongsToMany(User::class , 'users_courses' , 'course_id', 'user_id')
//            ->withPivot('user_id');
//    }

    public function getMyCoursesAttribute()
    {
        $myCourses = UsersCourse::where('user_id', auth()->user()->id)->get();
        return $myCourses;
    }

    public function getAvgRatingAttribute()
    {
        return CourseComments::where('course_id', $this->id)->avg('rate');
    }
    public function getFavoriteAttribute()
    {
        return CourseLikes::where(['user_id' => auth()->user()->id , 'course_id' =>$this->id])->get();
    }


    public function units(){
        return $this->hasMany(Unit::class);
    }


    public function getLessonsCountAttribute()
    {
        $unitsIDs = $this->units->pluck('id')->toArray();
        return Lesson::whereIn('unit_id', $unitsIDs)->count();
    }



//    public function avgReviewRating()
//    {
//        return $this->reviews()->avg('rate');
//    }

    public function getImageAttribute($value)
    {
        return url('uploads/courses/' . $value);
    }

    public function getFileAttribute($value)
    {
            return url('uploads/courses/' . $value);
    }


    public function getVideoAttribute($value)
    {
        return url('uploads/courses/' . $value);
    }




}

//ALTER TABLE `courses` ADD `price` DOUBLE NULL AFTER `views_count`, ADD `discount` INT(11) NULL AFTER `price`, ADD `price_after_discount` DOUBLE NULL AFTER `discount`, ADD `hours` INT(11) NULL AFTER `price_after_discount`;

//ALTER TABLE `courses` ADD `file_type` ENUM('image','file') NULL AFTER `accept_comments`, ADD `file` VARCHAR(191) NULL AFTER `file_type`;
