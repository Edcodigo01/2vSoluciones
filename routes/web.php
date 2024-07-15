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

Route::get('viewmail/{view}', 'Controller@viewmail')->name('viewmail');

Route::get('/', 'Controller@home')->name('home');

Route::post('login', 'Controller@login')->name('login');
Route::get('logout', 'Controller@logout')->name('logout');

// Route::get('nuestros-servicios', 'Controller@servicios')->name('servicios');
Route::get('servicios', 'Controller@servicios')->name('servicios');



Route::get('articulo/{id}', 'ArticleController@article')->name('article');
Route::get('testimonios', 'Controller@testimonios')->name('testimonios');

Route::get('videos', 'Controller@videos')->name('videos');
Route::get('lista-videos-busqueda', 'Controller@videosSearch');


Route::get('list_videos_front', 'Controller@list_videos_front')->name('list_videos_front');


Route::get('articulos_ajax', 'ArticleController@articulos_ajax')->name('articulos_ajax');
Route::get('contactanos', 'Controller@contactanos')->name('contactanos');
    Route::post('message-contact', 'Controller@messageContact')->name('message-contact');

Route::get('nosotros', 'Controller@somos')->name('somos');
Route::get('articulos-interes', 'ArticleController@articulos')->name('list_articles');
    Route::post('enabled_article/{id}', 'ArticleController@enabled_article');
    Route::post('disable_article/{id}', 'ArticleController@disable_article');

Route::get('articulos', 'ArticleController@articles')->name('articles');

Route::get('inicio-de-sesion-administracion', 'Controller@AdminIni')->name('AdminIni');
Route::group(['middleware' => 'admin'], function () {

    Route::resource('mensajes-email', 'EmailController');

        Route::get('list_emailsrecibidos', 'EmailController@list_emailsrecibidos')->name('list_emailsrecibidos');

    Route::get('admin', 'Controller@admin')->name('admin');

    Route::resource('usuario', 'userController');
    Route::resource('clientes', 'ClientController');
    Route::resource('proyectos', 'ProjectController');
    Route::resource('servicios-de-proyecto', 'ProjectServicesController');

    Route::resource('administrar-servicios', 'ServiceController');
    Route::resource('administrar-etiquetas', 'TagsController');
        Route::post('disabledTag/{id}', 'TagsController@disabledTag');
        Route::post('enabledTag/{id}', 'TagsController@enabledTag');
    Route::resource('administrar-categorias', 'CategoryController');
        Route::post('disabledCategory/{id}', 'CategoryController@disabledCategory');
        Route::post('enabledCategory/{id}', 'CategoryController@enabledCategory');



    Route::resource('administrar-articulos', 'ArticleController');


    Route::resource('administrar-videos', 'VideoController');
        Route::get('list_videos', 'VideoController@list_videos')->name('list_videos');
    // front
    Route::get('list_articles', 'ArticleController@list_articles')->name('list_articles');
    Route::post('articleUpdate/{id}', 'ArticleController@articleUpdate')->name('articleUpdate');
    Route::get('list_adminservices', 'ServiceController@list_adminservices')->name('list_adminservices');
    Route::get('list_admintags', 'TagsController@list_admintags')->name('list_admintags');
    Route::get('list_admincategories', 'CategoryController@list_admincategories')->name('list_admincategories');
    Route::post('iniciar-proyecto/{id}', 'ProjectController@startProject')->name('startProject');
    Route::get('list_clients', 'ClientController@list_clients')->name('list_clients');
});