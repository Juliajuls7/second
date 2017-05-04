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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//--------------ГОРОДА--------------------------------------------------

// добавление
Route::get('/cities/create', 'CityController@create');
Route::post('/cities', 'CityController@store');
//// просмотр
Route::get('/cities', 'CityController@index');
// редактирование
Route::get('/cities/edit/{id}', 'CityController@edit');
Route::put('/cities/edit/{id}', 'CityController@save');
// удаление 
Route::delete('/cities/{id}', 'CityController@destroy');

//----------КАТЕГОРИИ---------------------------------------------------

// добавление 
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
//// просмотр
Route::get('/categories', 'CategoryController@index');
// редактирование 
Route::get('/categories/edit/{id}', 'CategoryController@edit');
Route::put('/categories/edit/{id}', 'CategoryController@save');
// удаление 
Route::delete('/categories/{id}', 'CategoryController@destroy');

//----------ПОДКАТЕГОРИИ---------------------------------------------------

// добавление
Route::get('/subcategories/create', 'SubcategoryController@create');
Route::post('/subcategories', 'SubcategoryController@store');
//// просмотр
Route::get('/subcategories', 'SubcategoryController@index');
// редактирование
Route::get('/subcategories/edit/{id}', 'SubcategoryController@edit');
Route::put('/subcategories/edit/{id}', 'SubcategoryController@save');
// удаление 
Route::delete('/subcategories/{id}', 'SubcategoryController@destroy');

//----------ВОПРОСЫ---------------------------------------------------

// добавление
Route::get('/questions/create', 'QuestionController@create');
Route::post('/questions', 'QuestionController@store');
//// просмотр
Route::get('/questions', 'QuestionController@index');
Route::get('/questions/{id}', 'QuestionController@show'); //показать 1 
// редактирование
Route::get('/questions/edit/{id}', 'QuestionController@edit');
Route::put('/questions/edit/{id}', 'QuestionController@save');
// удаление 
Route::delete('/questions/{id}', 'QuestionController@destroy');