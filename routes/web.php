<?php

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/albums','AlbumController@index');

Route::get('/albums/view/{id}','AlbumController@view');*/

Auth::routes();

Route::get('/', 'IssueController@index');
Route::get('/home', 'IssueController@index')->name('home');
Route::get('/issues/filter/{type}', 'IssueController@filter');


/*Customer Routes*/
Route::get('/customers','CustomerController@index');
Route::get('/customers/view/{id}','CustomerController@view');
Route::get('/customers/add','CustomerController@add');
Route::post('/customers/create','CustomerController@create');
Route::get('/customers/edit/{id}','CustomerController@edit');
Route::post('/customers/update/{id}','CustomerController@update');
Route::get('/customers/delete/{id}','CustomerController@delete');

/*Product Routes*/
Route::get('/products','ProductController@index');
Route::get('/products/view/{id}','ProductController@view');
Route::get('/products/add','ProductController@add');
Route::post('/products/create','ProductController@create');
Route::get('/products/edit/{id}','ProductController@edit');
Route::post('/products/update/{id}','ProductController@update');
Route::get('/products/delete/{id}','ProductController@delete');

/*Issue Routes*/
Route::get('/issues','IssueController@index');
// Route::get('/products/view/{id}','ProductController@view');
// Route::get('/products/add','ProductController@add');
// Route::post('/products/create','ProductController@create');
// Route::get('/products/edit/{id}','ProductController@edit');
// Route::post('/products/update/{id}','ProductController@update');
// Route::get('/products/delete/{id}','ProductController@delete');

// Route::resources('/customers','CustomerController')
