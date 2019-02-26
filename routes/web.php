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

Route::prefix('/admin')->group(function(){

	// Authentication Admins Routes...
	Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'AdminAuth\LoginController@login');
	Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

	Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'AdminAuth\RegisterController@register');

	Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.update');

	Route::get('email/verify', 'AdminAuth\VerificationController@show')->name('admin.verification.notice');
	Route::get('email/verify/{id}', 'AdminAuth\VerificationController@verify')->name('admin.verification.verify');
	Route::get('email/resend', 'AdminAuth\VerificationController@resend')->name('admin.verification.resend');

	Route::middleware('admin.auth')->group(function(){
		Route::get('/home', 'AdminController@index')->name('admin.home');

		Route::get('/no-permission', 'AdminController@noPermission')->name('no.permission');

		Route::prefix('/user-active-managers')->group(function(){

			Route::get('', 'UserActiveManagerController@index')->name('admin.user.active.managers');
			Route::get('/user-active-datatables', 'UserActiveManagerController@getUserData')->name('admin.user.active.data');

			Route::get('/detail/{id}', 'UserActiveManagerController@userActiveShow')->name('admin.user.active.detail');

			Route::get('/edit/{id}', 'UserActiveManagerController@userActiveEdit')->name('admin.user.active.edit');
			Route::post('/edit/{id}', 'UserActiveManagerController@userActiveUpdate')->name('admin.user.active.update');
			Route::put('/edit/password/{id}', 'UserActiveManagerController@userActiveUpdatePassword')->name('admin.user.active.update.password');

			Route::post('/image-upload/create', 'UserActiveManagerController@userActiveUploadImage')->name('admin.user.active.upload.image');
			Route::post('/image-upload/delete', 'UserActiveManagerController@userActiveDeleteImage')->name('admin.user.active.delete.image');

			Route::post('/store', 'UserActiveManagerController@userActiveStore')->name('admin.user.active.store');

			Route::put('/{id}/deactive', 'UserActiveManagerController@userActiveDeactive')->name('admin.user.active.deactive');

			Route::delete('/{id}/delete', 'UserActiveManagerController@userActiveDelete')->name('admin.user.active.delete');
		});

		Route::prefix('/user-deactive-managers')->group(function(){

			Route::get('', 'UserDeactiveManagerController@index')->name('admin.user.deactive.managers');
			Route::get('/user-deactive-datatables', 'UserDeactiveManagerController@getUserData')->name('admin.user.deactive.data');

			Route::get('/detail/{id}', 'UserDeactiveManagerController@userDeactiveShow')->name('admin.user.deactive.detail');

			Route::get('/edit/{id}', 'UserDeactiveManagerController@userDeactiveEdit')->name('admin.user.deactive.edit');
			Route::post('/edit/{id}', 'UserDeactiveManagerController@userDeactiveUpdate')->name('admin.user.deactive.update');
			Route::put('/edit/password/{id}', 'UserDeactiveManagerController@userDeactiveUpdatePassword')->name('admin.user.deactive.update.password');

			Route::post('/image-upload/create', 'UserDeactiveManagerController@userDeactiveUploadImage')->name('admin.user.deactive.upload.image');
			Route::post('/image-upload/delete', 'UserDeactiveManagerController@userDeactiveDeleteImage')->name('admin.user.deactive.delete.image');

			Route::post('/store', 'UserDeactiveManagerController@userDeactiveStore')->name('admin.user.deactive.store');

			Route::put('/{id}/active', 'UserDeactiveManagerController@userDeactiveActive')->name('admin.user.deactive.active');

			Route::delete('/{id}/delete', 'UserDeactiveManagerController@userDeactiveDelete')->name('admin.user.deactive.delete');
		});

		Route::prefix('/user-delete-managers')->group(function(){

			Route::get('', 'UserDeleteManagerController@index')->name('admin.user.delete.managers');
			Route::get('/user-delete-datatables', 'UserDeleteManagerController@getUserData')->name('admin.user.delete.data');

			Route::get('/detail/{id}', 'UserDeleteManagerController@userDeleteShow')->name('admin.user.delete.detail');

			Route::get('/edit/{id}', 'UserDeleteManagerController@userDeleteEdit')->name('admin.user.delete.edit');
			Route::post('/edit/{id}', 'UserDeleteManagerController@userDeleteUpdate')->name('admin.user.delete.update');
			Route::put('/edit/password/{id}', 'UserDeleteManagerController@userDeleteUpdatePassword')->name('admin.user.delete.update.password');

			Route::put('/{id}/upback', 'UserDeleteManagerController@userDeleteUpback')->name('admin.user.delete.upback');

			Route::delete('/{id}/delete', 'UserDeleteManagerController@userDeleteRealDelete')->name('admin.user.delete.realdelete');
		});

		Route::middleware('superadmin.auth')->group(function(){
			Route::prefix('/admin-active-managers')->group(function(){

				Route::get('', 'AdminActiveManagerController@index')->name('admin.admins.active.managers');
				Route::get('/admin-active-datatables', 'AdminActiveManagerController@getUserData')->name('admin.admins.active.data');

				Route::get('/detail/{id}', 'AdminActiveManagerController@adminActiveShow')->name('admin.admins.active.detail');

				Route::get('/edit/{id}', 'AdminActiveManagerController@adminActiveEdit')->name('admin.admins.active.edit');
				Route::post('/edit/{id}', 'AdminActiveManagerController@adminActiveUpdate')->name('admin.admins.active.update');
				Route::put('/edit/password/{id}', 'AdminActiveManagerController@adminActiveUpdatePassword')->name('admin.admins.active.update.password');

				Route::post('/image-upload/create', 'AdminActiveManagerController@adminActiveUploadImage')->name('admin.admins.active.upload.image');
				Route::post('/image-upload/delete', 'AdminActiveManagerController@adminActiveDeleteImage')->name('admin.admins.active.delete.image');

				Route::post('/store', 'AdminActiveManagerController@adminActiveStore')->name('admin.admins.active.store');

				Route::put('/{id}/deactive', 'AdminActiveManagerController@adminActiveDeactive')->name('admin.admins.active.deactive');

				Route::delete('/{id}/delete', 'AdminActiveManagerController@adminActiveDelete')->name('admin.admins.active.delete');
			});

			Route::prefix('/admin-deactive-managers')->group(function(){

				Route::get('', 'AdminDeactiveManagerController@index')->name('admin.admins.deactive.managers');
				Route::get('/admin-deactive-datatables', 'AdminDeactiveManagerController@getUserData')->name('admin.admins.deactive.data');

				Route::get('/detail/{id}', 'AdminDeactiveManagerController@adminDeactiveShow')->name('admin.admins.deactive.detail');

				Route::get('/edit/{id}', 'AdminDeactiveManagerController@adminDeactiveEdit')->name('admin.admins.deactive.edit');
				Route::post('/edit/{id}', 'AdminDeactiveManagerController@adminDeactiveUpdate')->name('admin.admins.deactive.update');
				Route::put('/edit/password/{id}', 'AdminDeactiveManagerController@adminDeactiveUpdatePassword')->name('admin.admins.deactive.update.password');

				Route::post('/image-upload/create', 'AdminDeactiveManagerController@adminDeactiveUploadImage')->name('admin.admins.deactive.upload.image');
				Route::post('/image-upload/delete', 'AdminDeactiveManagerController@adminDeactiveDeleteImage')->name('admin.admins.deactive.delete.image');

				Route::post('/store', 'AdminDeactiveManagerController@adminDeactiveStore')->name('admin.admins.deactive.store');

				Route::put('/{id}/active', 'AdminDeactiveManagerController@adminDeactiveActive')->name('admin.admins.deactive.active');

				Route::delete('/{id}/delete', 'AdminDeactiveManagerController@adminDeactiveDelete')->name('admin.admins.deactive.delete');
			});

			Route::prefix('/admin-delete-managers')->group(function(){

				Route::get('', 'AdminDeleteManagerController@index')->name('admin.admins.delete.managers');
				Route::get('/admin-delete-datatables', 'AdminDeleteManagerController@getUserData')->name('admin.admins.delete.data');

				Route::get('/detail/{id}', 'AdminDeleteManagerController@adminDeleteShow')->name('admin.admins.delete.detail');

				Route::get('/edit/{id}', 'AdminDeleteManagerController@adminDeleteEdit')->name('admin.admins.delete.edit');
				Route::post('/edit/{id}', 'AdminDeleteManagerController@adminDeleteUpdate')->name('admin.admins.delete.update');
				Route::put('/edit/password/{id}', 'AdminDeleteManagerController@adminDeleteUpdatePassword')->name('admin.admins.delete.update.password');

				Route::put('/{id}/upback', 'AdminDeleteManagerController@adminDeleteUpback')->name('admin.admins.delete.upback');

				Route::delete('/{id}/delete', 'AdminDeleteManagerController@adminDeleteRealDelete')->name('admin.admins.delete.realdelete');
			});
		});

		Route::prefix('/product-instock-managers')->group(function(){

			Route::get('', 'ProductController@index')->name('admin.product.instock.managers');
			Route::get('admin-product-instock-datatables', 'ProductController@getProductData')->name('admin.product.instock.data');

			Route::get('/product/add', 'ProductController@productAdd')->name('admin.product.instock.add');
			Route::post('/product/store', 'ProductController@productStore')->name('admin.product.instock.store');

			Route::get('/detail/{id}', 'ProductController@productDetail')->name('admin.product.instock.detail');

			Route::get('/edit/{id}', 'ProductController@productEdit')->name('admin.product.instock.edit');
			Route::post('/edit/{id}', 'ProductController@productUpdate')->name('admin.product.instock.update');

			Route::middleware('stockadmin.auth')->group(function(){
				Route::get('/edit/{id}/resolution', 'ProductController@productResolutionEdit')->name('admin.product.instock.resolutionedit');
				Route::post('/edit/{id}/resolution', 'ProductController@productResolutionUpdate')->name('admin.product.instock.resolutionupdate');
				Route::post('/detail/{id}/database-resolution', 'ProductController@productResolutionDetail')->name('admin.product.instock.dbresolutiondetail');
				Route::post('/edit/{id}/database-resolution', 'ProductController@productDBResolutionUpdate')->name('admin.product.instock.dbresolutionupdate');
				Route::post('/delete/{id}/database-resolution', 'ProductController@productDBResolutionDelete')->name('admin.product.instock.dbresolutiondelete');
			});

			Route::get('/edit/{id}/product-images', 'ProductController@productImageEdit')->name('admin.product.instock.productimageedit');
			Route::post('/edit/{id}/product-database-images', 'ProductController@productDBImageUpdate')->name('admin.product.instock.dbproductimageupdate');
			Route::post('/edit/{id}/product-images-update', 'ProductController@productImageUpdate')->name('admin.product.instock.productimageupdate');
			Route::post('/delete/{id}/product-database-images', 'ProductController@productDBImageDelete')->name('admin.product.instock.dbproductimagedelete');
		});

		Route::middleware('stockadmin.auth')->group(function(){
			Route::prefix('/product-outstock-managers')->group(function(){
				Route::get('', 'ProductController@productOutStockIndex')->name('admin.product.outstock.managers');
				Route::get('admin-product-outstock-datatables', 'ProductController@getProductOutStockData')->name('admin.product.outstock.data');

				Route::get('/edit/{id}', 'ProductController@productOutstockEdit')->name('admin.product.outstock.edit');
				Route::post('/edit/{id}', 'ProductController@productOutstockUpdate')->name('admin.product.outstock.update');
			});
		});
	});
});

Route::prefix('/user')->group(function(){

	Auth::routes();

	Route::middleware('auth')->group(function(){
		Route::get('/home', 'HomeController@index')->name('user-home');
	});
});

Route::prefix('shop')->group(function(){

	Route::get('/', 'ShopController@index')->name('shop.product');
	Route::get('detail/{slug}', 'ShopController@productDetail')->name('shop.product.detail');
	Route::get('detail/{id}/database-resolution', 'ShopController@productResolutionDetail')->name('shop.product.dbresolutiondetail');
	Route::get('add2cart/{id}', 'CartController@productAdd2Cart')->name('shop.product.add2cart');
	Route::get('cart', 'CartController@productCart')->name('shop.product.cart');

});
