<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Route::post('/upload', 'NewsController@uploadSubmit');
*/



Route::get('/', function () {

    return view('welcome');
});

//Route::resource('articles','ArticleController');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


Route::get('about_home', function () {
    return view('about_1');
});

Route::get('about_history', function () {
    return view('about_2');
});

Route::get('about_people', function () {
    return view('about_3');
});

Route::get('news', function () {
    return view('news');
});
Route::get('news2', function () {
    return view('news2');
});
Route::get('graduate', function () {
    return view('graduate');
});


Route::get('student', function () {
    return view('student');
});

Route::get('news', function () {
    return view('news');
});

Route::get('officer2', function () {
    return view('officer');
});

Route::get('gallery', function () {
    return view('gallery');
});
Route::get('galleryView', function () {
    return view('galleryView');
});

Route::get('galleryAdd', function () {
    return view('gallery.galleryAdd');
});

Route::get('user', function () {
    return view('user.index');
});

Route::get('/deleteTrash', 'HomeController@deleteTrash');

Route::get('/slideshow', 'slideController@show');


Route::get('/upload', 'ContentController@uploadForm');
Route::post('/upload', 'ContentController@uploadSubmit');

Route::post('/upload_gal','Controller@upload_gal');
Route::get('/img_del','Controller@img_del');
Route::post('/insert','Controller@insert');
Route::post('/update','Controller@update');
Route::get('/delete_gal','Controller@delete_gal');
Route::post('/insert_gal','Controller@insert_gal');
Route::get('/galleryM','GalleryController@gallery_cat_show');

Route::post('/editOfficer_cat','OfficerController@editOfficer_cat');

Route::post('/editOfficer','OfficerController@editOfficer');
Route::get('/deleOfficer','OfficerController@deleteOfficer');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::get('/userw', 'UserController@index')->name('user');
Route::get('/duser', 'UserController@destroy');
Route::post('/usera', 'UserController@store')->name('user');

Route::get('/gcontent', 'GroupContentController@gcontentshow');
Route::post('/ugcontent', 'GroupContentController@update');
Route::get('/dgcontent','GroupContentController@destroy');
Route::post('/agcontent','GroupContentController@store');


Route::post('/ucontent', 'NewsController@update');
Route::get('/dcontent', 'NewsController@destroy');
Route::get('/econtent/{nid}', 'NewsController@edit');
Route::post('/acontent', 'NewsController@store');
Route::get('/icontent', 'NewsController@index');
Route::get('/content', 'NewsController@newsshow');

Route::get('/slideDes', 'slideController@setDes');
Route::get('/slideshow', 'slideController@show');
Route::get('/addslide','SlideController@add');
Route::post('/uploadslide','SlideController@savePH');
Route::get('/slide/edit/{id}',['as'=>'edit/slide','uses'=>'SlideController@edit']);
Route::get('/slide/delete','SlideController@delete');
Route::post('/slide/update','SlideController@update');

Route::get('/officerM', 'OfficerController@view');
Route::get('/officerPeople', 'OfficerController@showPeople');
Route::post('/insertPeople', 'OfficerController@insertPeople');
Route::post('/insertOfficer', 'OfficerController@insertOfficer');
Route::get('/deldeteOfficer_cat', 'OfficerController@deldeteOfficer_cat');
Route::get('/deleteOfficer', 'OfficerController@deleteOfficer');
/*
Route::post('/content', 'ContentController@update')->name('content');
Route::get('/content', 'ContentController@destroy')->name('content');
Route::get('/content', 'ContentController@edit')->name('content');
Route::get('/content', 'ContentController@store')->name('content');
Route::get('/content', 'ContentController@index')->name('content');
*/

/*
Route::post('/content', 'ContentController@update')->name('content');
Route::get('/content', 'ContentController@destroy')->name('content');
Route::get('/content', 'ContentController@edit')->name('content');
Route::get('/content', 'ContentController@store')->name('content');
Route::get('/content', 'ContentController@index')->name('content');
*/

Route::get('managerm','ManagerController@view');
Route::get('insertmanage','ManagerController@insert');
