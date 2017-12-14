<?php


Route::get('/','IndexController@index')->name('mainpage');
Route::get('/{cat}/article/{post_id}/{post_title}', 'IndexController@singleview');
Route::get('/category/{id}/{cat_title}', 'IndexController@catnews');

Route::post('/ajax/category','AjaxController@store');
Route::post('/ajax/edit/category','AjaxController@editcat');
Route::post('/ajax/update/category','AjaxController@update');
Route::post('/ajax/delete/category','AjaxController@destroy');
Route::post('/ajax/news/delete','AjaxController@newsdestroy');
Route::post('/ajax/category1','AjaxController@categoryfirst');
Route::post('/ajax/category2','AjaxController@categorysecond');
Route::post('/ajax/category3','AjaxController@categorythird');
Route::post('/ajax/category4','AjaxController@category4th');
Route::post('/ajax/category5','AjaxController@category5th');
Route::post('/ajax/seacat','AjaxController@seacat');

//Route::post('/ajax/category',function(){
	//$str=['a','v'];
	//return json_encode($str);
//});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin/add-category','Menucontroller@create');
Route::get('/admin/new-post','BlogController@index');
Route::post('/admin/new-post/store','BlogController@store');
Route::get('/admin/All-News','BlogController@allpost');
Route::get('/admin/{id}/edit-post','BlogController@editpost');
Route::post('/admin/{id}/edit-post/update','BlogController@update');

Route::get('/admin/select-menu','Menucontroller@index');






