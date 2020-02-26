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

use App\model\admin\Banner;

Route::get('/', function () {

    $banner = new Banner();
    $banners = $banner->find();

    return view('site.home', [
        'banners' => $banners
    ]);
})->name('site.home');

Route::get('/cursos', function () {
    return view('site.courses');
})->name('site.courses');

Route::get('/contato', function () {
    return view('site.contact');
})->name('site.contact');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/wm-admin/banner', function () {
//    return view('admin.banner');
//})->name('admin.banner');

Route::resource('wm-admin/banner', 'admin\\BannerController')->names('banner');
Route::resource('wm-admin/publication', 'admin\\PublicationController')->names('publication');

Route::resource('wm-admin', 'admin\\AdminController')->names('admin')->parameters(['wm-admin' => 'admin']);


