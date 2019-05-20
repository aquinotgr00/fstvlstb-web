<?php

Route::get('/', 'HomeMemberController@index')->name('home');

Route::get('/boxset', 'BoxsetController@index');

Route::get('/change-language/{locale}','ChangeLanguageController@changeLanguage')->name('change.language');

Route::get('/filestream/{id}','FileStreamController@fileStream')->name('stream.audio');
Route::get('/filestream','FileStreamController@fileStream')->name('stream.audio.single');

Route::get('file/download',['as' => 'files.download', 'uses' => 'FileDownloadController@downloadFile']);
Route::get('image/download',['as' => 'images.download', 'uses' => 'FileDownloadController@imageDownload']);
Route::get('image/preview',function(){
	return view('frontend-page.image-card');
});

Route::prefix('member')->group(function(){
	Route::post('/login', 'Auth\MemberLoginController@loginMember')->name('member.login');
	Route::post('/register', 'Auth\MemberRegisterController@register')->name('member.register');
	Route::get('/logout', 'Auth\MemberLoginController@logout')->name('member.logout');
	Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('member.password.reset');
	Route::get('/nif','NifController@index')->name('member.nif');
	Route::post('/change-image','NifController@changeImage')->name('member.change.image');
	Route::post('/edit-nif','NifController@changeData')->name('member.change.nif');
	Route::post('/ganti-password','NifController@gantiPassword')->name('member.ganti-password');
});

Route::prefix('twitter')->group(function(){
	Route::get('/auth','TwitterController@twitterlogin')->name('twitter.auth');
	Route::get('/callback','TwitterController@twitterCallback')->name('twitter.callback');
});

Route::prefix('facebook')->group(function(){
	Route::get('/auth','FacebookController@redirectToFacebookProvider')->name('facebook.auth');
	Route::get('/callback','FacebookController@handleProviderFacebookCallback')->name('facebook.callback');
	Route::get('/publish', 'GraphController@publishToProfile')->name('facebook.publish');
});

// E-COMMERCE ROUTES
Route::get('/store', 'StoreController@index')->name('store.index');
Route::post('/checkout', 'StoreController@checkout')->name('checkout.view');
Route::post('/midtrans-notification/handling', 'StoreController@midtransNotif')->name('store.midtrans.handler');
Route::get('/thank-you', 'StoreController@thankYou')->name('thank.you');
Route::post('/checkout-store', 'Api\\TransactionController@store')->name('checkout.store');
Route::post('/charge', 'Api\\TransactionController@charge')->name('checkout.charge');
Route::get('/confirm-payment/{token}', 'StoreController@confirmPayment')->name('confirm.payment');
Route::post('/confirm-payment', 'StoreController@storeProof')->name('store.payment.proof');

// MIDTRANS ROUTES
Route::post('/midtrans-finish', function(){
    return redirect()->route('home');
})->name('midtrans.finish');
Route::post('/midtrans-notification/handler', 'Api\\TransactionController@notificationHandler')->name('midtrans.notification.handler');

Route::prefix('admin')->group(function () {
	  Auth::routes();
   	Route::get('/', 'HomeController@index')->name('admin.dashboard');
   	Route::get('/members', 'AdminMemberController@index')->name('admin.member.page');
   	Route::get('/members/list', 'AdminMemberController@listData')->name('admin.member.list');
   	Route::get('/tracklist', 'AdminTracklistController@index')->name('admin.tracklist.page');
    Route::get('/tracklist/edit/{id}', 'AdminTracklistController@editForm')->name('admin.tracklist.edit');
    Route::post('/tracklist/update', 'AdminTracklistController@updateTracklist')->name('admin.tracklist.update');
    Route::post('/tracklist/upload/stream', 'AdminTracklistController@uploadTracklist')->name('admin.tracklist.upload.stream');
    Route::post('/tracklist/upload/preview', 'AdminTracklistController@uploadTracklistPreview')->name('admin.tracklist.upload.preview');
    Route::post('/tracklist/upload/zip', 'AdminTracklistController@uploadTracklistZip')->name('admin.tracklist.upload.zip');
	Route::get('/tracklist/list', 'AdminTracklistController@listData')->name('admin.tracklist.list');
	   
	// TRANSACTION ROUTES
   	Route::get('/transactions', 'TransactionController@index')->name('admin.transaction.page');
   	Route::get('/transactions/list', 'TransactionController@listData')->name('admin.transaction.list');
	Route::get('/transactions/listById', 'TransactionController@listDataById')->name('admin.transaction.list-by-id');
	Route::get('/transactions/item/{id}', 'TransactionController@show')->name('admin.transaction.show');
	Route::get('/transactions/get/{id}', 'TransactionController@getById')->name('admin.transaction.get-by-id');
	Route::post('/transactions/{id}/update', 'TransactionController@update')->name('admin.transaction.update');
	Route::post('/downloadExcel', 'TransactionController@exportToExcel')->name('admin.transaction.export');

	// PRODUCTION BATCH ROUTES
	Route::post('/production-batch', 'ProductionBatchController@store')->name('admin.production-batch.store');
	Route::get('/production-batch/{id}', 'ProductionBatchController@list')->name('admin.production-batch.list');
	Route::get('/production-batch/listById/{id}', 'ProductionBatchController@listDataById')->name('admin.production-batch.list-by-id');

	// PRODUCTION LIST
	Route::get('/productions/list/{batchId}', 'ProductionController@listData')->name('admin.production.list');
	   
	// PRODUCT ROUTES
	Route::get('/products', 'ProductController@index')->name('admin.product.page');
	Route::get('/products/create', 'ProductController@create')->name('admin.product.create');
	Route::post('/products', 'ProductController@store')->name('admin.product.store');
	Route::get('/products/list', 'ProductController@listData')->name('admin.product.list');
	Route::get('/products/item/{id}', 'ProductController@show')->name('admin.product.show');
	Route::post('/products/item/{id}', 'ProductController@update')->name('admin.product.update');
	Route::post('/products/{id}/delete', 'ProductController@destroy')->name('admin.product.destroy');
});


