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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Crear
Route::get('/event/create','EventController@createEventForm')->name('createEvent');
Route::post('/event/create','EventController@createEvent');
//Leer
Route::get('/events/list','EventController@listEvents')->name('listEvents');
//Actualizar
Route::get('/event/update/{id}','EventController@updateEventForm')->name('updateEventForm');
Route::post('/event/update','EventController@updateEvent')->name('updateEvent');

Route::post('/event/delete','EventController@deleteEvent')->name('eraseEvent');

