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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdmissionController;

Auth::routes();

// Route::get('/mtchub', 'HomeController@index');

Route::get('/mtchub/', 'HomeController@index');

Route::prefix('/mtchub/admin')->group(function(){
    
    Route::get('/','Auth\AdminLoginController@index');
    Route::post('/login','Auth\AdminLoginController@login')->name('login.submit');
    Route::get('/change_profile','AdminController@change_profile')->name('admin.change_profile');
    Route::post('/change_profile','AdminController@update_profile')->name('admin.update_profile');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    Route::get('/navigation-list/{category}','Admin\NavigationController@index');
    Route::get('/navigation-list/{category}/create','Admin\NavigationController@create');


    //page type
    Route::resource('/pageType','Admin\PageTypeController');


    //photo gallery
    Route::get('/navigation-list/{category}/{id}/showList','Admin\NavigationController@showMediaList');
    Route::get('/navigation-list/{category}/{id}/showList/create','Admin\NavigationController@addMedia');
    Route::post('/navigation-list/{category}/{id}/addAlbum','Admin\NavigationController@storeAlbum');
    Route::get('/navigation-list/media/{id}/delete','Admin\NavigationController@deleteMedia');
    Route::post('/navigation-list/media/{id}/update','Admin\NavigationController@updateMedia');

    //video gallery
    Route::get('/navigation-list/{category}/{id}/vlink','Admin\VideoController@showVideoList');
    Route::get('/navigation-list/{category}/{id}/vlink/create','Admin\VideoController@addVideo');
    Route::post('/navigation-list/{category}/{id}/addVideoAlbum','Admin\VideoController@storeVideoAlbum');
    Route::post('/navigation-list/vlink/{id}/update','Admin\VideoController@updateLinks');
    Route::get('/navigation-list/vlink/{id}/delete','Admin\VideoController@deleteLink');
    Route::post('/navigation-list/{category}/{id?}','Admin\NavigationController@store');
    Route::get('/navigation-edit/{category}/{id}/edit','Admin\NavigationController@edit');
    Route::put('/navigation-edit/{category}/{id}','Admin\NavigationController@update');
    Route::get('/navigation-edit/{category}/{id}','Admin\NavigationController@deleteIconImage');
    Route::get('/navigation-edit/{category}/{id}/deleteimage2','Admin\NavigationController@deleteFeaturedImage');
    Route::get('/navigation-edit/{category}/{id}/deleteimage3','Admin\NavigationController@deleteBannerImage');
    Route::get('/navigation-edit/{category}/{id}/deletemainattachment','Admin\NavigationController@deletemainattachment');
    Route::get('/navigation-edit/{category}/{id}/deleteattachment','Admin\NavigationController@deleteattachment');
    Route::get('/navigation-list/{category}/{id}/delete','Admin\NavigationController@destroy');
    Route::get('/navigation-list/{category}/{id}','Admin\NavigationController@childNavigation')->where(['id'=>'[0-9]+']);
    Route::get('/navigation-list/{category}/{id}/create','Admin\NavigationController@create')->where(['id'=>'[0-9]+']);
    

    Route::get('/global-setting','Admin\GlobalSettingController@global_setting');
    //Route::post('/global-setting','Admin\GlobalSettingController@create')->name('create.global-setting');
    Route::post('/global_setting','Admin\GlobalSettingController@updateSettings')->name('update.global_setting');
    Route::get('/subscribers-list','Admin\SubscriberController@index');
    Route::get('/subscribers-list/{id}','Admin\SubscriberController@destroy');
    Route::put('/navigation-list/{id}', 'Admin\NavigationController@update_status')->name('update_status');

    // ............................. feedback.......................
    Route::get('/feedbacks-list','Admin\FeedbackController@index');
    Route::get('/feedbacks-view/{id}','Admin\FeedbackController@view');
    Route::get('/feedbacks-list/{id}','Admin\FeedbackController@destroy');
    Route::put('/feedbacks-list/{id}', 'Admin\FeedbackController@update_status')->name('update_status');

// ............................. comment.......................

    Route::get('/{id}/comment_list','Admin\CommentController@index');
    Route::get('/{id}/comment-delete','Admin\CommentController@destroy');
    Route::get('/comment-status/{id}', 'Admin\CommentController@updatestatus');


    Route::get('/contact/{slug}',[ContactController::class,'Contactelete'])->name('contactDelete');




    Route::get('/contact/{slug}', [ContactController::class, 'Contactelete'])->name('contactDelete');
    Route::get('/job/{category}/{id}/create', 'JobController@AddJob')->name("AddJob");
    Route::get('/job/{category}/create', 'JobController@AddJob')->name("AddJob");
    Route::post('/jobstore/{category}', 'JobController@store')->name("AddJob1");
    Route::post('/jobstore/{category}/{id}', 'JobController@store')->name("AddJob2");
    Route::get('/jobedit/{category}/{id}', 'JobController@edit')->name("jobedit");
    Route::post('/jobupdate/{category}/{id}', 'JobController@JobUpdate');
    Route::get('/job/delete-banner-image/{category}/{id}/deleteimage3', 'JobController@deleteBannerImage')->name('deleteBannerImage');
    Route::get('/applied-job-list', 'ContactController@AppliedJob')->name("AppliedJob");




    Route::get('/job-list', 'AdmissionController@jobList')->name("joblist");



    // delete form

    Route::get('/delete/form/{id}', "AdmissionController@destroy_form")->name("delete_form");



    Route::post('/coursestore', 'CoursesController@store');
    // Route::post('/jobstore/{category}/{id}', 'JobController@store')->name("AddJob2");
    Route::get('/jobedit/{category}/{id}', 'JobController@edit')->name("jobedit");
    Route::post('/jobupdate/{category}/{id}', 'JobController@JobUpdate');
    Route::get('/job/delete-banner-image/{category}/{id}/deleteimage3', 'JobController@deleteBannerImage')->name('deleteBannerImage');
    Route::get('/applied-job-list', 'ContactController@AppliedJob')->name("AppliedJob");







});


// admission ceate
Route::get('/mtchub/admision', 'AdmissionController@AddAdmission');
Route::post('/mtchub/admissionforms', [AdmissionController::class, 'stores'])->name('admission_form');



Route::get('/mtchub/details/{informationslug}', [HomeController::class, 'singlePage'])->name('single_news');

Route::get('/mtchub/message/{informationslug}', [HomeController::class, 'single_message'])->name('single_message');



Route::get('/mtchub/get_gallery_photos',[HomeController::class,'get_gallery_photos'])->name('get_gallery_photos');
Route::get('mtchub/gallery-view/{slug}',[HomeController::class,'GalleryView'])->name('galleryview');
Route::get('mtchub/inquiry',[ContactController::class,'inquiry'])->name('inquiry');
Route::get('mtchub/job-category',[HomeController::class,'allCategory'])->name('allCategory');


Route::get('/mtchub/all-jobs',[HomeController::class,'allJobs'])->name('allJobs');
Route::get('/mtchub/all-testomonial',[HomeController::class, 'AllTestomonials']);






Route::get('mtchub/read-more/{slug}',[HomeController::class,'ReadMore'])->name('readmore');

Route::POST('mtchub/jobapply/store/{slug}',[ContactController::class,'ContactStore'])->name('storeapply');




Route::get('/mtchub/jobdetail/{jobslug}',[HomeController::class,'singlePage'])->name('single_job');
Route::get('/mtchub/jobapply/{jobslug}',[ContactController::class,'jobApply'])->name('jobapply');
Route::get('/mtchub/contact',[ContactController::class,'Contact'])->name('contact');




Route::POST('mtchub/contact/store',[ContactController::class,'ContactStore'])->name('contactstore');



Route::get('/mtchub/{slug}',[HomeController::class,'category'])->name('category');



Route::get('/mtchub/{category}/{subcategory}',[HomeController::class,'subcategory'])->name('subcategory');
