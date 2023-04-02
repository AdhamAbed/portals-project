<?php

use \App\Http\Controllers\WEB\Site\FrontController;
use \App\Http\Controllers\WEB\Site\CoursesController;
use \App\Http\Controllers\WEB\Site\pagesController;
use \App\Http\Controllers\WEB\Site\PayPalController;
use \App\Http\Controllers\WEB\Site\UserProfileController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\LangController;

//Route::group([
//    'prefix' => LaravelLocalization::setLocale(),
//    'middleware' => [
//        'localeSessionRedirect',
//        'localizationRedirect',
//        'localeViewPath'
//    ]
//], function () {

Route::group(['prefix' => '/'], function () {




    Route::get('/', 'WEB\Site\FrontController@index')->name('homePage');

    Route::get('/change/lang', [FrontController::class, 'lang_change'])->name('website.LangChange');
    Route::get('/', [FrontController::class, 'index'])->name('home');
    Route::get('/home', [FrontController::class, 'index']);
//    Route::get('/consultations', [FrontController::class , 'consulting'])->name('consultations');
    Route::get('/about-us', [FrontController::class, 'about'])->name('about');
    Route::get('/contact-us', [FrontController::class, 'contact'])->name('contact');
    Route::get('/private-course-request', [FrontController::class, 'privateCoursesRequest'])->name('privateCoursesRequest');
    Route::post('/private-course-request', [FrontController::class, 'sendPrivateCourseRequest'])->name('sendPrivateCourseRequest');
    Route::get('/careers', [FrontController::class, 'careers'])->name('careers');
    Route::get('/projects', [FrontController::class, 'projects'])->name('projects');
    Route::get('/project/{id}', [FrontController::class, 'view_project'])->name('view_project');

    Route::get('/courses', [CoursesController::class, 'courses'])->name('courses');
    Route::get('/category-courses/{id}', [CoursesController::class, 'categoryCourses'])->name('categoryCourses');
    Route::get('/courses/online', [CoursesController::class, 'onlineCourses'])->name('onlineCourses');
    Route::get('/courses/online/category/{id}', [CoursesController::class, 'categoryOnlineCourses'])->name('categoryOnlineCourses');
    Route::get('/courses/self-Learning', [CoursesController::class, 'selfLearningCourses'])->name('selfLearningCourses');
    Route::get('/courses/self-Learning/category/{id}', [CoursesController::class, 'categorySelfLearningCourses'])->name('categorySelfLearningCourses');
    Route::get('/course/{id}', [CoursesController::class, 'view_course'])->name('view_course');
    Route::get('/my-course/{id}', [CoursesController::class, 'my_course'])->name('my_course');
    Route::get('/course/{id}/register', [CoursesController::class, 'view_course_register'])->name('view_course_register');
    Route::post('/course/{id}/register', [CoursesController::class, 'course_register'])->name('course_register');
    Route::get('/course/{id}/pay', [CoursesController::class, 'course_pay'])->name('course_pay');
    Route::get('my-courses',[CoursesController::class,'my_courses'])->name('my_courses');

    Route::get('blog',[FrontController::class,'blog'])->name('blog');
    Route::get('blog/{id}',[FrontController::class,'show_blog'])->name('show_blog');


    Route::get('cart', [CoursesController::class, 'cart'])->name('cart');
//    Route::get('add-to-cart/{id}', [CoursesController::class, 'addToCart'])->name('add_to_cart');
    Route::post('add-to-cart/{id}', [CoursesController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('update-cart', [CoursesController::class, 'updateCart'])->name('update_cart');
    Route::delete('remove-from-cart', [CoursesController::class, 'removeFromCart'])->name('remove_from_cart');
    Route::get('cart-checkout', [CoursesController::class, 'cart_checkout'])->name('cart_checkout');
    Route::get('course-checkout/{course_id}', [CoursesController::class, 'course_checkout'])->name('course_checkout');
    Route::post('stripe-checkout', [CoursesController::class, 'stripeCheckout'])->name('stripe.checkout');
    Route::post('stripe-course-checkout', [CoursesController::class, 'courseStripeCheckout'])->name('stripe.courseStripeCheckout');


    Route::get('/consultations', [FrontController::class, 'consultations'])->name('consultations');
    Route::get('/consulting/{id}', [FrontController::class, 'view_consulting'])->name('view_consulting');
    Route::get('/consultationDetails', [FrontController::class, 'consultationByCategory'])->name('consultationDetails');
    Route::post('/store-consultation', [FrontController::class, 'storeConsultations'])->name('storeConsultations');
    Route::post('/apply-jop', [FrontController::class, 'applyJop'])->name('applyJop');
    Route::post('/contact-us', [FrontController::class, 'sendContactRequest'])->name('sendContactRequest');
    Route::get('/privacy-policy', [FrontController::class, 'privacy'])->name('privacy');
    Route::get('/partners', [FrontController::class, 'partners'])->name('partners');
    Route::get('/customers', [FrontController::class, 'customers'])->name('customers');
    Route::post('/notifMarkAsRead', [FrontController::class, 'MarkAsRead'])->name('notifMarkAsRead');


    Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
    Route::get('/change-password', [UserProfileController::class, 'change_password'])->name('user.change_password');
    Route::post('/change-password', [UserProfileController::class, 'save_password'])->name('user.change_password.update');
    Route::put('/profile/update/image', [UserProfileController::class, 'change_profile_img'])->name('user.profileImage.update');
    Route::post('/profile/update/information', [UserProfileController::class, 'update_profile_information'])->name('user.profileData.update');
//    Route::get('/my-courses', [UserProfileController::class, 'my_courses'])->name('user.my_courses');
    Route::get('/my-favorite', [UserProfileController::class, 'my_favorite'])->name('user.my_favorite');
    Route::post('course/add-favorite/{id}', [UserProfileController::class, 'add_favorite'])->name('user.add_favorite');
//    Route::get('my-courses/search',[UserProfileController::class,'showCourse'])->name('user.my_course.search');


    Route::get('/login', [FrontController::class, 'showLoginForm'])->name('user.login.form');
    Route::get('/register', [FrontController::class, 'showRegisterForm'])->name('user.register.form');
    Route::post('/register', [RegisterController::class, 'create'])->name('user.register');
    Route::get('/reset-password', [FrontController::class, 'resetPassword'])->name('user.resetPassword');
    Route::post('/forget-password', [ForgotPasswordController::class, 'forget'])->name('user.forget');
    Route::get('/change_password/{forgetCode}/{email}', [ForgotPasswordController::class, 'changePasswordForm'])->name('user.changePassword');
    Route::post('/reset', [ForgotPasswordController::class, 'reset'])->name('user.reset');
    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');


    Route::get('auth/google', [FrontController::class, 'redirectToGoogel'])->name('user.googleLogin');

    Route::get('auth/google/callback', [FrontController::class, 'googleSignin']);

    Route::get('show/payment', [PayPalController::class, 'index'])->name('index.payment');
//    Route::get('payment', [PayPalController::class , 'payment'])->name('payment');
//    Route::get('cancel', [PayPalController::class , 'cancel'])->name('payment.cancel');
//    Route::get('payment/success', [PayPalController::class , 'success'])->name('payment.success');

    Route::get('/paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'WEB\Site\PayPalController@payWithPaypal',));
    Route::post('/paypal', array('as' => 'paypal', 'uses' => 'WEB\Site\PayPalController@postPaymentWithpaypal',));
    Route::get('/paypal', array('as' => 'status', 'uses' => 'WEB\Site\PayPalController@getPaymentStatus',));

    Route::get('/notFound', 'WEB\Site\FrontController@index')->name('notFound');

    Route::get('/pageDetails/{id}', 'WEB\Site\FrontController@pageDetails')->name('pageDetails');

    Route::get('/donors', 'WEB\Site\FrontController@donors')->name('donors');

    Route::get('/events', 'WEB\Site\FrontController@events')->name('events');
    Route::get('/eventDetails/{id}', 'WEB\Site\FrontController@eventDetails')->name('eventDetails');

    Route::get('/allCourses', 'WEB\Site\FrontController@allCourses')->name('allCourses');
    Route::get('/courseDetails/{id}', 'WEB\Site\FrontController@courseDetails')->name('courseDetails');
    Route::get('/courseByCategory/{id}', 'WEB\Site\FrontController@courseByCategory')->name('courseByCategory');


    Route::get('/associations', 'WEB\Site\FrontController@associations')->name('associations');
    Route::get('/associationDetails/{id}', 'WEB\Site\FrontController@associationDetails')->name('associationDetails');

    Route::get('/posts', 'WEB\Site\FrontController@posts')->name('posts');
    Route::get('/postDetails/{id}', 'WEB\Site\FrontController@postDetails')->name('postDetails');


    Route::get('/articles', 'WEB\Site\FrontController@articles')->name('articles');
    Route::get('/articleDetails/{id}', 'WEB\Site\FrontController@articleDetails')->name('articleDetails');

    Route::get('/initiatives', 'WEB\Site\FrontController@initiatives')->name('initiatives');
    Route::get('/initiativeDetails/{id}', 'WEB\Site\FrontController@initiativeDetails')->name('initiativeDetails');

    Route::get('/research_studies', 'WEB\Site\FrontController@research_studies')->name('research_studies');
    Route::get('/researchStudyDetails/{id}', 'WEB\Site\FrontController@researchStudyDetails')->name('researchStudyDetails');

    Route::get('/ambassadors', 'WEB\Site\FrontController@ambassadors')->name('ambassadors');
    Route::get('/ambassadorsDetails/{id}', 'WEB\Site\FrontController@ambassadorsDetails')->name('ambassadorsDetails');


//    Route::get('/consultations', 'WEB\Site\FrontController@consultations')->name('consultations');
//    Route::get('/consultationDetails/{id}', 'WEB\Site\FrontController@consultationDetails')->name('consultationDetails');
//    Route::get('/consultationByCategory/{id}', 'WEB\Site\FrontController@consultationByCategory')->name('consultationByCategory');
//
//    Route::post('/storeConsultations', 'WEB\Site\FrontController@storeConsultations')->name('storeConsultations');


    Route::get('/usersPortal', 'WEB\Site\FrontController@usersPortal')->name('usersPortal');
    Route::post('/storeNewUser', 'WEB\Site\FrontController@storeNewUser')->name('storeNewUser');
    Route::post('/registerUser', 'WEB\Site\FrontController@registerUser')->name('registerUser');
    Route::post('/loginUsers', 'WEB\Site\FrontController@loginUsers')->name('loginUsers');
    Route::post('/do-login', 'WEB\Site\FrontController@doLogin')->name('doLogin');


    Route::group(['middleware' => ['auth']], function () {
        Route::get('/userProfile', 'WEB\Site\FrontController@userProfile')->name('userProfile');
        Route::get('/editProfile', 'WEB\Site\FrontController@editProfile')->name('editProfile');
        Route::post('/updateProfile', 'WEB\Site\FrontController@updateProfile')->name('updateProfile');
        Route::post('/profile/change_profile_img', 'WEB\Site\FrontController@change_profile_img')->name('change_profile_img');

        Route::get('/logoutUsers', 'WEB\Site\FrontController@logoutUsers')->name('logoutUsers');


        // Route::get('/changeUserPassword', 'WEB\Site\FrontController@changeUserPassword')->name('changeUserPassword');
        // Route::post('/updateUserPassword', 'WEB\Site\FrontController@updateUserPassword')->name('updateUserPassword');
        // Route::get('/userAddress', 'WEB\Site\FrontController@userAddress')->name('userAddress');
        // Route::get('/createUserAddress', 'WEB\Site\FrontController@createUserAddress')->name('createUserAddress');
        // Route::post('/storeUserAddress', 'WEB\Site\FrontController@storeUserAddress')->name('storeUserAddress');
        // Route::post('/storeUserAddress1', 'WEB\Site\FrontController@storeUserAddress1')->name('storeUserAddress1');
        // Route::get('/deleteUserAddress/{id}', 'WEB\Site\FrontController@deleteUserAddress')->name('deleteUserAddress');
        // Route::get('/editUserAddress/{id}', 'WEB\Site\FrontController@editUserAddress')->name('editUserAddress');
        // Route::post('/updateUserAddress/{id}', 'WEB\Site\FrontController@updateUserAddress')->name('updateUserAddress');

        // Route::get('/cancelFavoriteAddress/{id}', 'WEB\Site\FrontController@cancelFavoriteAddress')->name('cancelFavoriteAddress');
        // Route::get('/addFavoriteAddress/{id}', 'WEB\Site\FrontController@addFavoriteAddress')->name('addFavoriteAddress');


    });


    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return route('/login')->name('login_admin');
        });
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
        Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
        Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    });


    Route::group(['middleware' => ['web', 'admin', 'hasPermission'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
        Route::get('/', function () {
            return redirect('/admin/home');
        });
        Route::post('/changeStatus/{model}', 'WEB\Admin\HomeController@changeStatus');
        Route::get('/change/lang', 'WEB\Admin\HomeController@lang_change')->name('LangChange');
        Route::get('home', 'WEB\Admin\HomeController@index')->name('admin.home');
        Route::get('/getCities/{id}', 'WEB\Admin\HomeController@getCities');
        Route::get('/getCountries/', 'WEB\Admin\HomeController@getCountries');
        Route::get('/admins/{id}/edit', 'WEB\Admin\AdminController@edit')->name('admins.edit');
        Route::patch('/admins/{id}', 'WEB\Admin\AdminController@update')->name('users.update');
        Route::get('/admins/{id}/edit_password', 'WEB\Admin\AdminController@edit_password')->name('admins.edit_password');
        Route::post('/admins/{id}/edit_password', 'WEB\Admin\AdminController@update_password')->name('admins.edit_password');
        Route::get('/admins', 'WEB\Admin\AdminController@index')->name('admins.all');
        Route::post('/admins/changeStatus', 'WEB\Admin\AdminController@changeStatus')->name('admin_changeStatus');

        Route::delete('admins/{id}', 'WEB\Admin\AdminController@destroy')->name('admins.destroy');

        Route::post('/admins', 'WEB\Admin\AdminController@store')->name('admins.store');
        Route::get('/admins/create', 'WEB\Admin\AdminController@create')->name('admins.create');
        Route::get('/users/{id}/edit_password', 'WEB\Admin\UserController@edit_password')->name('users.edit_password');
        Route::post('/users/{id}/edit_password', 'WEB\Admin\UserController@update_password')->name('users.edit_password');
            Route::resource('/users', 'WEB\Admin\UserController');

        Route::resource('/courses', 'WEB\Admin\CourseController');
        Route::delete('courses/date/{id}', 'WEB\Admin\CourseController@deleteDate')->name('date.destroy');
        Route::delete('courses/content/{id}', 'WEB\Admin\CourseController@deleteContent')->name('content.destroy');
        Route::delete('courses/requirement/{id}', 'WEB\Admin\CourseController@deleteRequirement')->name('requirement.destroy');
        Route::resource('/courses_categories', 'WEB\Admin\CourseCategoryController');
        Route::resource('/consultations_categories', 'WEB\Admin\ConsultationCategoryController');
        Route::resource('/consultations', 'WEB\Admin\ConsultationController');
        Route::resource('/apply_jobs', 'WEB\Admin\ApplyJobController');
        Route::resource('/contact', 'WEB\Admin\ContactController');
        Route::get('/viewMessage/{id}', 'WEB\Admin\ContactController@viewMessage');
        Route::get('settings', 'WEB\Admin\SettingController@index')->name('settings.all');
        Route::post('settings', 'WEB\Admin\SettingController@update')->name('settings.update');
        Route::resource('/pages', 'WEB\Admin\PagesController');
        Route::post('/pages/changeStatus', 'WEB\Admin\PagesController@changeStatus');
        Route::delete('/pages/goal/{id}', 'WEB\Admin\PagesController@deleteGoal')->name('goal.destroy');
        Route::delete('/pages/reason/{id}', 'WEB\Admin\PagesController@deleteReason')->name('reason.destroy');
        Route::resource('/countries', 'WEB\Admin\CountryController');
        Route::resource('/categories', 'WEB\Admin\CategoryController');
        Route::resource('/cities', 'WEB\Admin\CityController');
        Route::resource('/roles', 'WEB\Admin\RoleController');
        Route::resource('/features', 'WEB\Admin\FeatureController');
        Route::resource('/consultants', 'WEB\Admin\ConsultantController');


// By mh
        Route::resource('/units', 'WEB\Admin\UnitController');
        Route::resource('/course_statistics', 'WEB\Admin\CourseStatisticsController');
        Route::resource('/lessons', 'WEB\Admin\LessonController');
        Route::resource('/sliders', 'WEB\Admin\SliderController');
        Route::resource('/blogs', 'WEB\Admin\BlogController');
        Route::resource('/articles', 'WEB\Admin\ArticleController');
        Route::resource('/customers', 'WEB\Admin\CustomerController');
        Route::resource('/locations', 'WEB\Admin\LocationController');
        Route::resource('/branches', 'WEB\Admin\BranchController');
        Route::resource('/schedule_courses', 'WEB\Admin\ScheduleCourseController');
        Route::resource('/private_courses_requests', 'WEB\Admin\PrivateCoursesRequestController');
        Route::resource('/socials_media', 'WEB\Admin\SocialMediaController');
        Route::resource('/partners', 'WEB\Admin\PartnerController');
        Route::resource('/projects', 'WEB\Admin\ProjectController');
        Route::resource('/faqs', 'WEB\Admin\FaqController');
        Route::resource('/trainers', 'WEB\Admin\TrainerController');
        Route::resource('/courseComments', 'WEB\Admin\CourseCommentsController');
        Route::post('/reorderedFaqs', 'WEB\Admin\FaqController@reorderedFaqs')->name('reorderedFaqs');
        Route::delete('/media-gallery/delete/{id}', [\App\Http\Controllers\WEB\Admin\ProjectController::class, 'galleryDelete'])->name('gallery.delete');

    });


//    Route::get('/reset-password', function () {
//        return view('auth/reset-password');
////        return view('auth/passwords/email');
//    })->name('user.resetPassword');


//        Route::resource('/posts', 'WEB\Admin\PostController');


//        Route::resource('/articles', 'WEB\Admin\ArticleController');
//        Route::resource('/events', 'WEB\Admin\EventController');
//        Route::resource('/initiatives', 'WEB\Admin\InitiativeController');
//        Route::resource('/research_studies', 'WEB\Admin\ResearchStudyController');
//        Route::resource('/associations', 'WEB\Admin\AssociationController');
//        Route::resource('/donors', 'WEB\Admin\DonorController');
//        Route::resource('/ambassadors', 'WEB\Admin\AmbassadorController');


});



Route::get('chage-languge/{lang}',[LangController::class ,'change_languge'])->name('change-languge');