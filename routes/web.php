<?php

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token) {
        // implement your reset password route here!
    }]);

Route::get('/', 'Auth\AuthController@getLogin');

Route::group(['prefix' => ''], function () {

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    ###signup
    Route::get('signup', 'SignupController@index');
    Route::get('checkUniqueEmail', array('as' => 'post', 'uses' => 'SignupController@checkUniqueEmail'));
    Route::post('signup-store', 'SignupController@store');
});


Route::group(['middleware' => ['auth']], function () {

    ###Dashboard
    Route::get('dashboard', 'DashboardController@index');
    Route::post('dashbord-store', 'DashboardController@store');

    ###Favorite Section
    Route::get('favorite', 'FavoriteController@index');
    Route::post('store-favorite', 'FavoriteController@store');
    Route::get('edit-favorite/{id}', 'FavoriteController@edit');
    Route::post('update-favorite', 'FavoriteController@update');
    Route::get('delete-favorite/{id}', 'FavoriteController@destroy');
    Route::get('signup-brand', 'FavoriteController@brandsignup');
    Route::post('signup-store-admin', 'FavoriteController@signupstore');
    Route::get('branduser-profile-details/{id?}', 'FavoriteController@branduserprofiledetails');
    Route::get('branduser-profile-edit/{id?}', 'FavoriteController@branduserprofileedit');
    Route::post('branduser-update-profileinfo', 'FavoriteController@updateprofile');
    Route::post('update-brand-profileinfo', 'FavoriteController@updatebrand');
    

    ###Category Section
    Route::get('category', 'CategoryController@index');
    Route::post('store-category', 'CategoryController@store');
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('update-category', 'CategoryController@update');
    Route::get('delete-category/{id}', 'CategoryController@destroy');

    ###Upload
    Route::get('upload-brand', 'UploadController@index');
    Route::post('store-upload-brand', 'UploadController@store');

    ###promo-list
    Route::get('promo-list', 'PromoController@index');
    Route::get('promo-details/{id}/{status}', 'PromoController@details');
    Route::get('approved-details/{id}/{status}', 'PromoController@approveddetails');
    Route::get('p-promo-details/{id}', 'PromoController@pdetails');
    Route::get('storelatdata', array('as' => 'post', 'uses' => 'PromoController@storelat'));
    Route::get('storelngdata', array('as' => 'post', 'uses' => 'PromoController@storelng'));


    ###profile
    Route::get('profile', 'ProfileController@index');
    Route::get('profile-edit/{id?}', 'ProfileController@edit');
    Route::get('brand-profile-edit/{id?}', 'ProfileController@brandedit');
    Route::post('update-brandinfo', 'ProfileController@updateprofile');
    Route::post('update-profileinfo', 'ProfileController@update');
    Route::get('changepassword', 'ProfileController@changepassword');
    Route::post('newpassword-store', 'ProfileController@passwordstore');

    ###message
    Route::get('message', 'MessageController@index');
    Route::post('send-message', 'MessageController@store');

    ###reject message
    Route::get('reject-message', 'RejectMessageController@index');
    Route::get('reject-message-form', 'RejectMessageController@create');
    Route::post('store-message', 'RejectMessageController@store');
    Route::get('delete-reject-message/{id}', 'RejectMessageController@destroy');

    ###admin-profile
    Route::get('admin-profile', 'ProfileController@adminprofile');

    ###message
    Route::get('admin-message', 'MessageController@index');
    Route::get('admin-message-form', 'MessageController@sendMessage');
    Route::post('send-message', 'MessageController@store');

    ###brandInfo
    Route::get('pending-list', 'BrandDealInfoController@pendingList');
    Route::get('update-info/{id}/{status}', 'BrandDealInfoController@updatepending');
    Route::get('approve-list', 'BrandDealInfoController@approveList');
    Route::get('reject-list', 'BrandDealInfoController@rejectList');
    Route::post('update-reject', 'BrandDealInfoController@updatereject');
    Route::get('with-hold-list', 'BrandDealInfoController@unPublishList');
    Route::get('with-hold-details/{id}', 'BrandDealInfoController@unPublishDetails');
    Route::get('unpublish/{id}', 'BrandDealInfoController@updateunPublish');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

