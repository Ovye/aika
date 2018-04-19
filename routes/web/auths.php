<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/13/2018
 * Time: 10:17 AM
 */

use Illuminate\Support\Facades\Route;

Route::get('login', 'Auths\LoginController@showForm');
Route::post('login', 'Auths\LoginController@validateLogin')->name('do.login');
Route::get('register', 'Auths\RegisterController@showForm');
Route::get('complete-reg/{user_id}', 'Auths\RegisterController@completeReg');
Route::post('register', 'Auths\RegisterController@doRegistration');

// Social networks auths
Route::post('social/{provider}', 'Auths\SocialAuthController@redirectToProvider');
Route::get('social/{provider}/callback', 'Auths\SocialAuthController@handleProviderCallback');
Route::post('social-reg', 'Auths\RegisterController@storeCompleteRegData');

//Verifications
Route::get('verify-account-code/{token}', 'Auths\VerifyAccountController@verifyCode');
Route::post('verify-account-code/', 'Auths\VerifyAccountController@validateAccountCode');
Route::post('get-account-code/', 'Auths\VerifyAccountController@getAccountCode');
Route::get('verify-email/{token}', 'Auths\VerifyAccountController@verifyEmail');
Route::post('verify-account-email/', 'Auths\VerifyAccountController@verifyAccountEmail');
Route::post('send-new-verification-link/', 'Auths\VerifyAccountController@sendNewVerificationLink')->name('new.email.link');
Route::get('validate-account-email/{token}', 'Auths\VerifyAccountController@validateAccountEmail');

//Password recovery
Route::get('recover-password', 'Auths\PasswordRecoveryController@index');
Route::post('validate-password-recovery', 'Auths\PasswordRecoveryController@validateRecoveryData');
Route::get('change-password/{token}', 'Auths\ChangePasswordController@index');
Route::post('validate-change-password', 'Auths\ChangePasswordController@validatePasswordChange');

//Dashboard
Route::get('dashboard', 'Backends\DashboardController@index');

// logout
Route::get('logout', 'Auths\LogoutController@index');

Route::get('test', function () {

    $user = \App\User::findOrFail(2);
    //Assign roles
    $user->assignRole(['sender', 'traveller']);

    //Give permissions
//    $user->givePermissionTo([
//        'add parcels', 'edit parcels',
//        'pick parcels', 'add users', 'edit users', 'delete users', 'send parcels', 'pick parcels'
//    ]);

});