<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Admin Routes
Route::get('admin/register',[BackendController::class,'register']);
Route::post('admin/credential',[BackendController::class,'registered']);

Route::group(['middleware'=>"admin"],function(){

    //Layout routes
    Route::get('admin/dashboard',[BackendController::class, 'index']);
    Route::get('admin/categories',[BackendController::class, 'categories']);
    Route::get('admin/login',[BackendController::class, 'login']);
    Route::post('admin/login',[BackendController::class,'loggedIn']);
    Route::get('admin/logout',[BackendController::class,'logout']);


    //Category routes
    Route::post('admin/categorystore',[BackendController::class,'CategoryStore']);
    Route::get('admin/categorylist',[BackendController::class,'CategoryList']);
    Route::get('admin/categoryedit/{id}',[BackendController::class,'CategoryEdit']);
    Route::post('admin/CategoryUpdate',[BackendController::class,'CategoryUpdate']);
    Route::get('admin/categorydelete/{id}',[BackendController::class,'CategoryDelete']);
    Route::get('admin/categorystatus/{id}',[BackendController::class,'CategoryStatus']);


    //Adding application routes
    Route::get('admin/addsoftware',[BackendController::class,'addsoftware']);
    Route::get('admin/softwarelist',[BackendController::class,'SoftwareList']);
    Route::post('admin/softwarestore',[BackendController::class,'SoftwareStore']);
    Route::get('admin/softwareedit/{id}',[BackendController::class,'SoftwareEdit']);
    Route::post('admin/softwareupdate',[BackendController::class,'SoftwareUpdate']);
    Route::get('admin/softwaredelete/{id}',[BackendController::class,'SoftwareDelete']);
    Route::get('admin/softwarestatus/{id}',[BackendController::class,'SoftwareStatus']);

    //News routes
    Route::get('admin/addnews',[BackendController::class,'AddNews']);
    Route::post('admin/storenews',[BackendController::class,'StoreNews']);
    Route::get('admin/newslist',[BackendController::class,'NewsList']);
    Route::get('admin/newsedit/{id}',[BackendController::class,'NewsEdit']);
    Route::post('admin/newsupdate',[BackendController::class,'NewsUpdate']);
    Route::get('admin/newsdelete/{id}',[BackendController::class,'NewsDelete']);
    Route::get('admin/newsstatus/{id}',[BackendController::class,'NewsStatus']);

    //Author routes
    Route::get('admin/addauthor',[BackendController::class,'AddAuthor']);
    Route::post('admin/storeauthor',[BackendController::class,'StoreAuthor']);
    Route::get('admin/authorlist',[BackendController::class,'AuthorList']);
    Route::get('admin/authordelete/{id}',[BackendController::class,'AuthorDelete']);


    
    //Review routes
    Route::get('admin/reviewlist',[BackendController::class,'ReviewList']);
    Route::get('admin/reviewdelete/{id}',[BackendController::class,'ReviewDelete']);

    //Search routes
    Route::get('admin/searchlist',[BackendController::class,'SearchList']);
    Route::get('admin/searchdelete/{id}',[BackendController::class,'SearchDelete']);

    //contact routes
    Route::get('admin/contact',[BackendController::class,'ContactData']);
    Route::get('admin/contactdelete/{id}',[BackendController::class,'ContactDelete']);


});


//FrontEnd Routes
Route::get('/',[FrontendController::class,'Homepage']);
Route::get('categories/{id}',[FrontendController::class,'CategoryList']);
Route::get('windows',[FrontendController::class,'Windows']);
Route::get('android',[FrontendController::class,'Android']);
Route::get('mac',[FrontendController::class,'Mac']);
Route::get('trending',[FrontendController::class,'Trending']);
Route::get('search',[FrontendController::class,'Search'])->name('search')->middleware('preventDirectAccess');
Route::get('application/{slug}',[FrontendController::class,'ApplicationData']);
Route::post('review-submit',[FrontendController::class,'Review']);

Route::get('news/{slug}',[FrontendController::class,'NewsList']);
Route::get('newsall',[FrontendController::class,'NewsAll']);

//about and legal pages routes
Route::get('info',[FrontendController::class,'Info']);
Route::get('contact',[FrontendController::class,'Contact']);
Route::post('submit',[FrontendController::class,'FormSubmit']);

Route::get('filedownload',[FrontendController::class,'FileDownload']);
Route::post('download',[FrontendController::class,'DownloadFile']);

