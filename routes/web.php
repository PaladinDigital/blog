<?php

Route::group([ 'middleware' => 'web', 'namespace' => '\PaladinDigital\Blog\Http\Controllers' ], function() {
  Route::get('admin/blog', 'AdminController@index')->name('blog.index');
  Route::get('admin/blog/post', 'AdminController@form')->name('blog.post.create-form');
  Route::post('admin/blog/post', 'AdminController@store')->name('blog.post.create');
});
