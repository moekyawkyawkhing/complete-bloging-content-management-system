<?php

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/dashboard', 'HomeController@index');

	// for admin post


	Route::get('post/edit/{id}',[

		'uses' => 'PostController@edit',
		'as'	=> 'post.edit'

	]);

	Route::post('post/update/{id}',[

		'uses' => 'PostController@update',
		'as'	=> 'post.update'

	]);


	Route::get('post',[

		'uses' => 'PostController@index',
		'as'	=> 'post'

	]);


	Route::get('post/create',[

		'uses' => 'PostController@create',
		'as'	=> 'post.create'

	]);

	Route::post('post/create',[

		'uses' => 'PostController@store',
		'as'	=> 'post.store'

	]);


	Route::get('post/delete/{id}',[

		'uses' => 'PostController@destroy',
		'as'	=> 'post.delete'

	]);

	Route::get('post/trash',[

		'uses' => 'PostController@trash',
		'as'	=> 'post.trash'

	]);

	Route::get('post/restore/{id}',[

		'uses' => 'PostController@restore',
		'as'	=> 'post.restore'

	]);

	Route::get('post/kill/{id}',[

		'uses' => 'PostController@kill',
		'as'	=> 'post.kill'

	]);


	//for admcin category
	Route::get('category',[

		'uses' => 'CategoryController@index',
		'as'	=> 'category'

	]);

	Route::get('category/create',[

		'uses' => 'CategoryController@create',
		'as'	=> 'category.create'

	]);

	Route::post('category/create',[

		'uses' => 'CategoryController@store',
		'as'	=> 'category.store'

	]);

	Route::get('category/edit/{id}',[

		'uses' => 'CategoryController@edit',
		'as'	=> 'category.edit'

	]);

	Route::post('category/update/{id}',[

		'uses' => 'CategoryController@update',
		'as'	=> 'category.update'

	]);

	Route::delete('category/delete/{id}',[

		'uses' => 'CategoryController@destroy',
		'as'	=> 'category.delete'

	]);

	// for tag
	Route::get('tag',[

		'uses' => 'TagController@index',
		'as'	=> 'tag'

	]);

	Route::get('tag/create',[

		'uses' => 'TagController@create',
		'as'	=> 'tag.create'

	]);

	Route::post('tag/create',[

		'uses' => 'TagController@store',
		'as'	=> 'tag.store'

	]);

	Route::get('tag/edit/{id}',[

		'uses' => 'TagController@edit',
		'as'	=> 'tag.edit'

	]);

	Route::post('tag/update/{id}',[

		'uses' => 'TagController@update',
		'as'	=> 'tag.update'

	]);

	Route::delete('tag/delete/{id}',[

		'uses' => 'TagController@destroy',
		'as'	=> 'tag.delete'

	]);

	/*user create*/
	Route::get('user',[

		'uses' => 'UserController@index',
		'as'	=> 'user'

	]);

	Route::get('user/create',[

		'uses' => 'UserController@create',
		'as'	=> 'user.create'

	]);

	Route::post('user/create',[

		'uses' => 'UserController@store',
		'as'	=> 'user.create'

	]);

	Route::get('admin/remove/{id}',[

		'uses' => 'UserController@remove_admin',
		'as'	=> 'user.remove.admin'

	])->middleware('admin');

		Route::get('user/delete/{id}',[

		'uses' => 'UserController@destroy',
		'as'	=> 'user.delete'

	])->middleware('admin');

	Route::get('admin/add/{id}',[

		'uses' => 'UserController@add_admin',
		'as'	=> 'user.add.admin'

	])->middleware('admin');

	Route::get('user/profile',[

		'uses' => 'UserController@profile',
		'as'	=> 'user.profile'

	])->middleware('admin');

	Route::post('user/profile',[

		'uses' => 'UserController@profile_update',
		'as'	=> 'user.profile'

	])->middleware('admin');

	/* -------------------------site setting------------------------- */

	Route::get('site/setting',[

		'uses' => 'SiteSettingController@index',
		'as'	=> 'site.setting'

	]);

	Route::post('site/setting/{id}',[

		'uses' => 'SiteSettingController@update',
		'as'	=> 'site.setting.update'

	]);
});

Route::get('/',[

	'uses' => 'FrontendController@index',
	'as'	=> 'frontend.home'

]);

/* -----------------------------singel post----------------------------- */

Route::get('post/{slug}',[

	'uses' => 'FrontendController@singlePost',
	'as'	=> 'single.post'

]);

/* -------------------------------category------------------------------- */

Route::get('category/{id}',[

	'uses' => 'FrontendController@category',
	'as'	=> 'category.post'

]);

/* -------------------------------tag------------------------------- */

Route::get('tag/{id}',[

	'uses' => 'FrontendController@tag',
	'as'	=> 'tag.post'

]);

/* ------------------------------searching------------------------------ */

Route::get('results','FrontendController@search');

/* --------------------------------subscriber-------------------------------- */

Route::post('subscribe',[

	'uses' => 'FrontendController@subscribe',
	'as' 	=> 'subscribe'
]);