<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth', 'namespace' => 'App\\Api\\V1\\Controllers'], function(Router $api) {


        $api->post('signup', 'SignUpController@signUp');
        $api->post('login', 'LoginController@login');


        $api->post('recovery', 'ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'ResetPasswordController@resetPassword');
    });
    $api->group(['namespace' => 'App\\Api\\V1\\Controllers'], function (Router $api) {
        $api->post('deals-list', 'DealsController@index');
        $api->post('deals-details', 'DealsController@details');
        $api->post('category-list', 'DealsController@category');
        $api->post('category-wise-list', 'DealsController@categorywiselist');
        $api->post('category-details', 'DealsController@categorydetails');
        $api->post('hitcount', 'DealsController@noOfHitcount');

        $api->post('favorite-list', 'DealsController@favourite');
        $api->post('favorite-add', 'DealsController@addfavorite');
        $api->post('favorite-delete', 'DealsController@deletefavorite');
        $api->post('registration', 'DealsController@registration');

        $api->post('device-info-add', 'DealsController@adddeviceInfo');
        $api->post('get-lat-lng', 'DealsController@latlngList');
        $api->post('category-latlng', 'DealsController@categoryWiseLatLng');

        $api->post('message-list', 'DealsController@message');
        $api->post('message-delete', 'DealsController@deleteAdminMsg');
        $api->post('message-details', 'DealsController@messagedetails');
        $api->get('pushnotifiction', 'DealsController@pushnotifiction');
    });


    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {


        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                            'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
                ]);
            });

            $api->get('hello', function() {
                return response()->json([
                            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
                ]);
            });
        });
        