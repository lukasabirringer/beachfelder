<?php

Auth::routes();

Route::group(['namespace' => 'Frontend'], function () {

  Route::post('/favorite/{beachcourt}', 'BeachcourtController@favoriteBeachcourt');
  Route::post('/unfavorite/{beachcourt}', 'BeachcourtController@unFavoriteBeachcourt');

  Route::get('/', 'HomepageController@show')->name('homepage.show');

  Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'ProfileController@confirmRegistration']);

  Route::post('/search', 'SearchController@show');

  Route::get('/stadt', 'CityController@index')->name('cities.index');
  Route::get('/stadt/{name}', 'CityController@show')->name('cities.show');

  Route::get('/beachvolleyballfeld-{cityslug}/@{latitude},{longitude}', 'BeachcourtController@show')->name('beachcourts.show');
  Route::get('/beachvolleyballfeld-{cityslug}/@{latitude},{longitude}/bewerten', 'BeachcourtController@rate')->middleware('auth')->name('beachcourts.rate');
  Route::post('/beachvolleyballfeld/einreichen', 'SubmittedbeachcourtController@store')->name('beachcourtsubmit.store');
  Route::get('/beachvolleyballfeld/submit', 'SubmittedbeachcourtController@submit')->name('beachcourtsubmit.submit');

  Route::post('/rating/new', 'RatingController@store')->name('rating.new');

  Route::get('/user/{name}', 'ProfileController@show')->middleware('auth')->name('profile.show');
  Route::get('/user/{name}/edit', 'ProfileController@edit')->middleware('auth')->name('profile.edit');
  Route::post('/user/update', 'ProfileController@update')->middleware('auth')->name('profile.update');
  Route::get('/profile/profil-loeschen', 'ProfileController@destroy')->middleware('auth')->name('profile.deleteuser');
  Route::post('/profil/uploadprofilepicture', 'ProfileController@storeimage')->middleware('auth')->name('profile.uploadprofilepicture');

  Route::get('/i/{slug}', 'PagesController@show')->name('page.show');
});


Route::group(['namespace' => 'Backend', 'middleware' => 'App\Http\Middleware\IsAdmin'], function () {

  Route::get('/backend/dashboard', 'DashboardController@show')->name('backendDashboard.show');

  Route::get('/backend/beachcourts', 'BeachcourtController@index')->name('backendBeachcourt.index');
  Route::get('/backend/beachcourts/hinzufuegen', 'BeachcourtController@create')->name('backendBeachcourt.create');
  Route::get('/backend/beachcourts/{id}', 'BeachcourtController@show')->name('backendBeachcourt.show');
  Route::patch('/backend/beachcourts/{id}', 'BeachcourtController@update')->name('backendBeachcourt.update');
  Route::delete('/backend/beachcourts/{id}', 'BeachcourtController@destroy')->name('backendBeachcourt.destroy');
  Route::post('/backend/beachcourts/erstellen', 'BeachcourtController@store')->name('backendBeachcourt.store');
  Route::get('/backend/beachcourts/{id}/bearbeiten', 'BeachcourtController@edit')->name('backendBeachcourt.edit');

  Route::get('/backend/user/hinzufuegen', 'UserController@create')->name('backendUser.create');
  Route::get('/backend/user/{id}', 'UserController@show')->name('backendUser.show');
  Route::get('/backend/user', 'UserController@index')->name('backendUser.index');
  Route::patch('/backend/user/{id}', 'UserController@update')->name('backendUser.update');
  Route::delete('/backend/user/{id}', 'UserController@destroy')->name('backendUser.destroy');
  Route::post('/backend/user/erstellen', 'UserController@store')->name('backendUser.store');
  Route::get('/backend/user/{id}/bearbeiten', 'UserController@edit')->name('backendUser.edit');
});
