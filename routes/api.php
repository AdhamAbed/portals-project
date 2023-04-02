<?php

use Illuminate\Http\Request;


    Route::get('settings', 'API\AppController@settings');  
        
    Route::post('/signUpUsers', 'API\UserController@signUpUsers');  
    Route::post('/checkCode', 'API\UserController@checkCode');  
    Route::post('/reSendCode', 'API\UserController@reSendCode');  
    Route::post('/forgotPassword','API\UserController@forgotPassword');     
    Route::post('/loginForUsers', 'API\UserController@loginForUsers'); 
    
    Route::get('/homeScreen', 'API\AppController@homeScreen'); 
    Route::get('/getServicesByCategory', 'API\AppController@getServicesByCategory');  
    Route::get('/getServicesByPoints', 'API\AppController@getServicesByPoints');  
    Route::get('/getServicesByUnfixedPrice', 'API\AppController@getServicesByUnfixedPrice');  
    Route::get('/getServicesDetails', 'API\AppController@getServicesDetails');  

    Route::get('pageDetails', 'API\AppController@pageDetails'); 
    Route::post('/sendContactMsg', 'API\AppController@sendContactMsg');

    Route::get('/getCategories', 'API\AppController@getCategories');  

    Route::get('/getPackages', 'API\AppController@getPackages');  
    Route::get('/getPackageDetails', 'API\AppController@getPackageDetails');  



    
    
    
    // Route::get('/getAds', 'API\AppController@getAds');  
    // Route::get('/getMap', 'API\AppController@getMap');  
    // Route::get('/getRelatedProducts', 'API\AppController@getRelatedProducts');  
    // Route::get('/getAllEvents', 'API\AppController@getAllEvents');  
    // Route::get('/eventDetails', 'API\AppController@eventDetails');  
    // Route::get('/getAllGalleries', 'API\AppController@getAllGalleries');  
    // Route::get('/galleriesDetails', 'API\AppController@galleriesDetails');  
    // Route::get('/getAllArticles', 'API\AppController@getAllArticles');  
    // Route::get('/articleDetails', 'API\AppController@articleDetails');  
    // Route::get('/teamMemberdetails', 'API\AppController@teamMemberdetails');  

    // Route::get('/getCitiesByCountry', 'API\AppController@getCitiesByCountry');  
    // Route::get('/getCompetitionBrand', 'API\AppController@getCompetitionBrand');  
    // Route::get('/getCompetitionModel', 'API\AppController@getCompetitionModel');  
    // Route::get('/getYears', 'API\AppController@getYears');  
    // Route::get('/getCompetitionCategory', 'API\AppController@getCompetitionCategory');  
    // Route::get('/getCompetitionOtherCategory', 'API\AppController@getCompetitionOtherCategory');  
    // Route::get('/getPaymentMethod', 'API\AppController@getPaymentMethod');  
    // Route::get('/getCompetitionQuestion', 'API\AppController@getCompetitionQuestion');  
    // Route::get('competitionResults', 'API\AppController@competitionResults');

    // Route::get('/carDetails', 'API\AppController@carDetails'); 
    // Route::get('/scanCode', 'API\AppController@scanCode'); 
    // Route::get('/ratedCars', 'API\AppController@ratedCars'); 


    // Route::post('/loginBySocial', 'API\UserController@loginBySocial'); 
    




    
    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('/profile', 'API\UserController@profile');  
        Route::get('/logout', 'API\UserController@logout');  
        Route::post('/changePassword', 'API\UserController@changePassword'); 
        Route::post('/editProfile', 'API\UserController@editProfile'); 
        Route::get('/getMyNotifications', 'API\AppController@getMyNotifications');
        
        Route::post('/requestService', 'API\AppController@requestService'); 
        Route::post('/requestSpecialService', 'API\AppController@requestSpecialService'); 
        Route::post('/requestPackages', 'API\AppController@requestPackages'); 
        
        Route::get('/getMyProjects', 'API\AppController@getMyProjects');
        Route::get('/getMyProjectDetails', 'API\AppController@getMyProjectDetails');
        Route::get('/turnOffNotification', 'API\AppController@turnOffNotification');
        
        Route::get('/getMyPoints', 'API\AppController@getMyPoints');
        Route::get('/getMyContracts', 'API\AppController@getMyContracts');
        Route::get('/getMyPackages', 'API\AppController@getMyPackages');
        Route::get('/getMyInvoices', 'API\AppController@getMyInvoices');



        Route::get('/getChatMessage','API\ChatController@getChatMessage');
        Route::post('/sendMessage','API\ChatController@sendMessage');
        
        
        
        
        
        
        
        
        
        
        // Route::post('createNewArticle', 'API\AppController@createNewArticle');
        // Route::post('createNewVolunteer', 'API\AppController@createNewVolunteer');


        // Route::post('createCompetitionRegistration', 'API\AppController@createCompetitionRegistration');


        // Route::post('/reserve_location_now', 'API\AppController@reserve_location_now');
        
        
        // Route::get('/getMyAddresses', 'API\UserController@getMyAddresses');
        // Route::post('/addNewAddress', 'API\UserController@addNewAddress');
        // Route::post('/editMyAddress', 'API\UserController@editMyAddress');
        // Route::get('/deleteMyAddress', 'API\UserController@deleteMyAddress');
        
        
        // Route::post('checkout', 'API\CartController@checkout');
        // Route::get('myOrders', 'API\AppController@myOrders');

        // Route::get('/adminHomeScreen', 'API\AppController@adminHomeScreen'); 

        // Route::get('/evaluationHomeScreen', 'API\AppController@evaluationHomeScreen'); 
        
        
        
        // Route::get('ourClientsList', 'API\AppController@ourClientsList');
        // Route::get('rateOrder', 'API\AppController@rateOrder');
        // Route::get('myRewards', 'API\AppController@myRewards');
        // Route::get('/getOurStatistics', 'API\AppController@getOurStatistics');  



        // Route::get('myFavoriteProducts', 'API\AppController@myFavoriteProducts'); 
        // Route::get('addToFavoriteProduct', 'API\AppController@addToFavoriteProduct'); 
        // Route::get('unFavoriteProduct', 'API\AppController@unFavoriteProduct'); 

        
        
        // Route::post('/addProductToCart', 'API\CartController@addProductToCart');
        // Route::get('/deleteFromCart', 'API\CartController@deleteFromCart');
        // Route::post('/changeQuantity', 'API\CartController@changeQuantity');
        // Route::get('/myCart', 'API\CartController@myCart');
        
        
    
        
        
        // Route::post('/checkCoupon', 'API\CartController@checkCoupon');
        
        
        // Route::get('/cartItemsCount', 'API\AppController@cartItemsCount');  



    });



