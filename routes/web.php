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

Route::get('/', function () {
    return view('frontend-page.index');
})->name('home');

Route::get('/boxset', 'BoxsetController@index');
Route::get('file/download',[
    'as' => 'files.download', 'uses' => 'FileDownloadController@downloadFile']);
Route::get('image/download',[
    'as' => 'images.download', 'uses' => 'FileDownloadController@imageDownload']);
Route::post('/member/login', 'Auth\MemberLoginController@loginMember')->name('member.login');
Route::post('/member/register', 'Auth\MemberRegisterController@register')->name('member.register');
Route::get('/member/logout', 'Auth\MemberLoginController@logout')->name('member.logout');

Route::prefix('admin')->group(function () {
	Auth::routes();
   	Route::get('/', 'HomeController@index')->name('admin.dashboard');
   	Route::get('/members', 'AdminMemberController@index')->name('admin.member.page');
   	Route::get('/members/list', 'AdminMemberController@listData')->name('admin.member.list');

});


