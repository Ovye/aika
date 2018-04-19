<?php
/**
 * Created by PhpStorm.
 * User: JOSIAH
 * Date: 2/23/2018
 * Time: 7:35 PM
 */

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('users', 'Backends\UsersController@index')->name('users.all');
    Route::post('user/edit', 'Backends\UsersController@edit')->name('user.edit');
    Route::post('users/update', 'Backends\UsersController@update')->name('user.update');
});

