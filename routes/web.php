<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::post('/image/upload', 'AuthController@uploadImage')->name('');
Route::post('/image/delete', 'AuthController@deleteImage')->name('');
Route::get('/account', 'AuthController@getAccount');
Route::post('/zingMp3_post', 'AuthController@zingMp3_post');
Route::post('/change_password_post', 'AuthController@change_password_post');
Route::post('/change_infomation_post', 'AuthController@change_infomation_post');
Route::get('/test', 'AuthController@test');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@admin')->name('admin');

    Route::group(['prefix' => 'class'], function () {
        Route::get('/', 'AdminController@class')->name('class');
        Route::group(['prefix' => 'add'], function () {
            Route::get('/', 'AdminController@add_class')->name('class');
            Route::post('/', 'AdminController@add_classP')->name('class');
        });
        Route::group(['prefix' => '{id}/edit'], function () {
            Route::get('/', 'AdminController@edit_class')->name('class');
            Route::post('/', 'AdminController@edit_classP')->name('class');
        });
        Route::post('/delete', 'AdminController@delete_classP')->name('class');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'AdminController@category')->name('category');
        Route::group(['prefix' => 'add'], function () {
            Route::get('/', 'AdminController@add_category')->name('category');
            Route::post('/', 'AdminController@add_categoryP')->name('category');
        });
        Route::group(['prefix' => '{id}/edit'], function () {
            Route::get('/', 'AdminController@edit_category')->name('category');
            Route::post('/', 'AdminController@edit_categoryP')->name('category');
        });
        Route::post('/delete', 'AdminController@delete_categoryP')->name('category');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'AdminController@post')->name('post');
        Route::group(['prefix' => 'add'], function () {
            Route::get('/', 'AdminController@add_post')->name('post');
            Route::post('/', 'AdminController@add_postP')->name('post');
        });
        Route::group(['prefix' => '{id}'], function () {
            Route::group(['prefix' => 'edit'], function () {
                Route::get('/', 'AdminController@edit_post')->name('post');
                Route::post('/', 'AdminController@edit_postP')->name('post');
            });
            Route::post('change_status', 'AdminController@change_status');
        });
        Route::post('/delete', 'AdminController@delete_postP')->name('post');
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', 'AdminController@setting')->name('setting');
        Route::post('/', 'AdminController@settingPOST')->name('setting');
    });

    Route::get('/user', 'AdminController@user')->name('user');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', 'HomeController@login')->name('login');
    Route::post('/', 'HomeController@loginP')->name('login');

    //Social Login
    
    Route::group(['prefix' => '{provider}'], function () {
        Route::get('/', 'UserSocialController@redirectToProvider')->name('');
        Route::get('/callback', 'UserSocialController@handleProviderCallback')->name('');
    });
});

Route::post('/page_login', 'HomeController@page_loginP');
Route::post('/page_logout', 'HomeController@page_logoutP');

Route::group(['prefix' => 'logout'], function () {
    Route::post('/', 'HomeController@logoutP')->name('logout');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', 'HomeController@register')->name('register');
    Route::post('/', 'HomeController@registerP')->name('register');
});

Route::group(['prefix' => 'forgotPassword'], function () {
    Route::get('/', 'HomeController@forgotPassword')->name('forgotPassword');
    Route::post('/', 'HomeController@forgotPasswordP')->name('forgotPassword');
});

Route::group(['prefix' => 'category'], function () {
    Route::group(['prefix' => '{category_slug}'], function () {
        Route::get('/', 'HomeController@getCategory')->name('');
    });
});

Route::group(['prefix' => 'chuyen-muc'], function () {
    Route::group(['prefix' => '{category_slug}'], function () {
        Route::get('/', 'HomeController@getCategory')->name('');
    });
});

Route::group(['prefix' => 'post'], function () {
    Route::group(['prefix' => '{post_slug}'], function () {
        Route::get('/', 'HomeController@getPost')->name('');
    });
});

Route::group(['prefix' => 'bai-viet'], function () {
    Route::group(['prefix' => '{post_slug}'], function () {
        Route::get('/', 'HomeController@getPost')->name('');
    });
});
