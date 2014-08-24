<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/21/14
 * Time: 12:46 PM
 * To change this template use File | Settings | File Templates.
 */

Route::filter('auth.reg',function () {
    if (Auth::check() == false) {
        return Redirect::route('reg.login');
    }
});

Route::filter('guest.reg',function () {
    if (Auth::check()) {
        return Redirect::route('reg.home');
    }
});