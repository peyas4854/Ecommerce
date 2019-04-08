<?php

/*auth*/
Auth::routes();
/*page controller*/


/*

-----front-end-------
*/
Route::get('/','ProductController@index');
Route::get('/all_product','ProductController@all_product');
Route::get('/category/{id}','ProductController@category_product');
Route::get('/member_register','pageController@member_register')->name('member');
Route::post('/member_add', 'pageController@member_add')->name('member_add');

Route::post('/cart_store', 'pageController@cart_store')->name('cart');
Route::get('/card_index', 'pageController@card_index')->name('card_index');
Route::get('/card_delete/{id}', 'pageController@card_delete');
Route::post('/card_update', 'pageController@card_update');

Route::post('/order_store', 'pageController@order_store');

Route::get('/checkout_index', 'checkoutController@index');







/*back-end*/

Route::get('/home', 'HomeController@index');
/*
============ admin-product =======
 */
Route::get('/product', 'HomeController@product');
Route::get('/show_product','ProductController@show_product');
Route::get('/product_edit/{id}','ProductController@product_edit');
Route::get('/product_delete/{id}','ProductController@product_delete');

Route::post('/product_store', 'ProductController@product_store');

Route::post('/product_update', 'ProductController@product_update');
Route::get('/single_product/{slug}','ProductController@single_product');
Route::post('/search_product', 'ProductController@search_product');





/*
=======
 admin-brand -----------
=======
 */
Route::get('/brand', 'HomeController@brand');
Route::post('/brand_store', 'HomeController@brand_store');

Route::resource('/brand', 'BrandController');
Route::get('/brand/delete/{id}', 'BrandController@delete');







/*----admin-category ----*/
Route::get('/show_category', 'CategoryController@index');
Route::get('/add_category', 'CategoryController@add');
Route::post('/store_category', 'CategoryController@store');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');
Route::get('/edit_category/{id}', 'CategoryController@edit_category');
Route::post('/category_update', 'CategoryController@category_update');







