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

Route::get('/', 'HomeMemberController@index')->name('home');

Route::get('/boxset', 'BoxsetController@index');

Route::get('/change-language/{locale}','ChangeLanguageController@changeLanguage')->name('change.language');

Route::get('/filestream/{id}','FileStreamController@fileStream')->name('stream.audio');
Route::get('/filestream','FileStreamController@fileStream')->name('stream.audio.single');

Route::get('file/download',[
    'as' => 'files.download', 'uses' => 'FileDownloadController@downloadFile']);
Route::get('image/download',[
    'as' => 'images.download', 'uses' => 'FileDownloadController@imageDownload']);


Route::prefix('member')->group(function(){
	Route::post('/login', 'Auth\MemberLoginController@loginMember')->name('member.login');
	Route::post('/register', 'Auth\MemberRegisterController@register')->name('member.register');
	Route::get('/logout', 'Auth\MemberLoginController@logout')->name('member.logout');
	Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('member.password.reset');
	Route::get('/nif','NifController@index')->name('member.nif');
});

Route::prefix('admin')->group(function () {
	  Auth::routes();
   	Route::get('/', 'HomeController@index')->name('admin.dashboard');
   	Route::get('/members', 'AdminMemberController@index')->name('admin.member.page');
   	Route::get('/members/list', 'AdminMemberController@listData')->name('admin.member.list');
   	Route::get('/tracklist', 'AdminTracklistController@index')->name('admin.tracklist.page');
    Route::get('/tracklist/edit/{id}', 'AdminTracklistController@index')->name('admin.tracklist.edit');
   	Route::get('/tracklist/list', 'AdminTracklistController@listData')->name('admin.tracklist.list');

});


