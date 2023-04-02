<?php
namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends Model
{
    use SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'description', 'header_title', 'header_description',
                                    'first_goal_title', 'first_goal_description','second_goal_title', 'second_goal_description',
                                    'third_goal_title', 'third_goal_description', 'first_reason_title', 'first_reason_description',
                                    'second_reason_title', 'second_reason_description', 'third_reason_title', 'third_reason_description',
                                    'certificates_sub_description','reasons_sub_description'
        ];

//ALTER TABLE `page_translations` ADD `first_goal_title` VARCHAR(300) NULL AFTER `header_title`, ADD `first_goal_description` TEXT NULL AFTER `header_description`;
//ALTER TABLE `page_translations` ADD `second_goal_title` VARCHAR(300) NULL AFTER `first_goal_title`, ADD `second_goal_description` TEXT NULL AFTER `first_goal_description`;
//ALTER TABLE `page_translations` ADD `third_goal_title` VARCHAR(300) NULL AFTER `second_goal_title`, ADD `third_goal_description` TEXT NULL AFTER `second_goal_description`;
//ALTER TABLE `page_translations` ADD `first_reason_title` VARCHAR(300) NULL AFTER `third_goal_title`, ADD `first_reason_description` TEXT NULL AFTER `third_goal_description`;
//ALTER TABLE `page_translations` ADD `second_reason_title` VARCHAR(300) NULL AFTER `first_reason_title`, ADD `second_reason_description` TEXT NULL AFTER `first_reason_description`;
//ALTER TABLE `page_translations` ADD `third_reason_title` VARCHAR(300) NULL AFTER `second_reason_title`, ADD `third_reason_description` TEXT NULL AFTER `second_reason_description`;
//ALTER TABLE `page_translations` ADD `certificates_sub_description` TEXT NULL AFTER `second_reason_description`;
//ALTER TABLE `page_translations` ADD `reasons_sub_description` TEXT NULL AFTER `second_reason_description`;
//
//ALTER TABLE `pages` ADD `first_certificate_image` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' AFTER `header_image`;
//ALTER TABLE `pages` ADD `second_certificate_image` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' AFTER `first_certificate_image`;
//ALTER TABLE `pages` ADD `third_certificate_image` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' AFTER `second_certificate_image`;
//

    protected $fillable = ['header_image','first_certificate_image',
                           'second_certificate_image','third_certificate_image'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'translations'];
    protected $appends = ['certificate_images'];


    public function getHeaderImageAttribute($value)
    {
        return url('uploads/pages/' . $value);
    }
//    public function getFirstCertificateImageAttribute($value)
//    {
//        return url('uploads/pages/' . $value);
//    }
//    public function getSecondCertificateImageAttribute($value)
//    {
//        return url('uploads/pages/' . $value);
//    }
//    public function getThirdCertificateImageAttribute($value)
//    {
//        return url('uploads/pages/' . $value);
//    }

    public function getCertificateImagesAttribute()
    {
        $certificateImages = AboutUsCertificatesImage::where('page_id', 1)->get();
        return $certificateImages;
    }



}

