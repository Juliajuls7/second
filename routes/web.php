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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//----------ГОРОДА--------------------------------------------------

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

//----------ПОДКАТЕГОРИИ-------------------------------------------------

// добавление
Route::get('/categories/subcategories/create/{id}', 'SubcategoryController@create');
Route::post('/categories/subcategories/{id}', 'SubcategoryController@store');
//// просмотр
Route::get('/categories/subcategories/{id}', 'SubcategoryController@index');
// редактирование
Route::get('/categories/subcategories/edit/{id}', 'SubcategoryController@edit');
Route::put('/categories/subcategories/edit/{id}', 'SubcategoryController@save');
// удаление
Route::delete('/categories/subcategories/{id}', 'SubcategoryController@destroy');

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

//----------КОММЕНТАРИИ К ВОПРОСАМ-----------------------------------

Route::post('/questions/{question}/comment', 'CommentQuestionController@store'); // добавить новый комментарий к вопросу
Route::put('/questions/{question}/{comment}', 'CommentQuestionController@setlike');

//----------ПОЛЬЗОВАТЕИ----------------------------------------------

// добавление
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
//// просмотр
Route::get('/users', 'UserController@index')->middleware('admin');
Route::get('/executors', 'UserController@showexecutor');
Route::get('/users/{id}', 'UserController@show'); //показать 1
// редактирование
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/edit/{id}', 'UserController@save');
// удаление
Route::delete('/users/{id}', 'UserController@destroy');
Route::get('/users/{id}/services', 'UserController@showservices');
Route::get('/users/{id}/works', 'UserController@showworks');
Route::get('/users/{id}/articles', 'UserController@showarticles');


//----------СТАТЬИ---------------------------------------------------
// добавление
Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles', 'ArticleController@store');
//// просмотр
Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', 'ArticleController@show'); //показать 1
// редактирование
Route::get('/articles/edit/{article}', 'ArticleController@edit');
Route::put('/articles/edit/{article}', 'ArticleController@save');
// удаление
Route::delete('/articles/{article}', 'ArticleController@destroy');

//----------КОММЕНТАРИИ К СТАТЬЯМ---------------------------------------
Route::post('/articles/{article}/comment', 'CommentArticleController@store'); // добавить новый комментарий к статье
//----------LIKES К СТАТЬЯМ---------------------------------------
Route::put('/articles/{article}', 'ArticleController@setlike');

//----------ЗАДАЧИ---------------------------------------------------
// добавление
Route::get('/services/create', 'ServiceController@create');
Route::post('/services', 'ServiceController@store');
//// просмотр
Route::get('/services', 'ServiceController@index');
Route::get('/services/{id}', 'ServiceController@show'); //показать 1
// редактирование
Route::get('/services/edit/{service}', 'ServiceController@edit');
Route::put('/services/edit/{service}', 'ServiceController@save');
// установление исполнителя
Route::post('/services/executor/{service}/{user}', 'ServiceController@setexecutor');
// завершение задачи
Route::post('/services/state/{service}', 'ServiceController@endservice1');
// установление исполнителя
Route::post('/services/executor/{service}/{user}', 'ServiceController@setexecutor');
// удаление
Route::delete('/services/{service}', 'ServiceController@destroy');

//----------КОММЕНТАРИИ К ЗАДАЧЕ ---------------------------------------
Route::post('/services/{service}/comment', 'CommentServiceController@store'); // добавить новый комментарий к заданию
//----------отзывы К ЗАДАЧЕ---------------------------------------
Route::post('/services/{service}/review_author', 'ReviewController@store'); // добавить новый отзыв к заданию
