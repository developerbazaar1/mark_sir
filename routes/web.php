<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/preview/amazon-desktop/{id}', [App\Http\Controllers\PreviewController::class, 'preview_amazon_desktop'])->name('preview-amazon-desktop');
Route::get('/preview/amazon-mobile/{id}', [App\Http\Controllers\PreviewController::class, 'preview_amazon_mobile'])->name('preview-amazon-mobile');
Route::get('/preview/insta-desktop/{id}', [App\Http\Controllers\PreviewController::class, 'preview_insta_desktop'])->name('preview-insta-desktop');
Route::get('/preview/insta-mobile/{id}', [App\Http\Controllers\PreviewController::class, 'preview_insta_mobile'])->name('preview-insta-mobile');
Route::get('/preview/publisher/{id}', [App\Http\Controllers\PreviewController::class, 'preview_publisher'])->name('preview-publisher');
Route::get('/preview/expire', [App\Http\Controllers\PreviewController::class, 'preview_expire'])->name('preview-expire');


Route::middleware(['auth','user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('user-dashboard');
    Route::get('/user/setting', [App\Http\Controllers\UserController::class, 'setting'])->name('user-setting');
    Route::post('/user/update-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('user-update-profile');
    Route::get('/getsites/{id}', [App\Http\Controllers\HomeController::class, 'getsites'])->name('getsites');
    Route::post('/user/store-user-selected-site', [App\Http\Controllers\UserController::class, 'store_user_selected_site'])->name('store-user-selected-site');
    Route::get('/upload-site-images/{id}', [App\Http\Controllers\UserController::class, 'upload_site_images'])->name('upload-site-images');
    Route::post('/user/store-site-images', [App\Http\Controllers\UserController::class, 'store_site_images'])->name('store-site-images');

    Route::get('/preview-email-confirmation/{id}', [App\Http\Controllers\UserController::class, 'preview_email_confirmation'])->name('preview-email-confirmation');

     Route::post('/user/email-to-sent-link', [App\Http\Controllers\UserController::class, 'email_to_sent_link'])->name('email-to-sent-link');
    

});


// admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'login'])->name('admin-login');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin-login');

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/admin/setting', [App\Http\Controllers\AdminController::class, 'setting'])->name('admin-setting');
    Route::post('/admin/setting-store', [App\Http\Controllers\AdminController::class, 'storesetting'])->name('admin-setting-store');

    // users
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin-users');
    Route::get('/admin/changeuserStatus', [App\Http\Controllers\AdminController::class, 'changeUserStatus'])->name('admin-changeuserStatus');
    Route::get('/admin/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user']); 


    // master setting
    Route::get('/admin/site-types', [App\Http\Controllers\MasterController::class, 'site_types'])->name('admin-site-types');
    Route::post('/admin/site-type-store', [App\Http\Controllers\MasterController::class, 'site_type_store'])->name('admin-site-type-store');
    Route::get('/admin/site-type-edit/{id}', [App\Http\Controllers\MasterController::class, 'site_type_edit'])->name('admin-site-type-edit');
    Route::post('/admin/site-type-update', [App\Http\Controllers\MasterController::class, 'site_type_update'])->name('admin-site-type-update');
    Route::get('/admin/delete-sitetype/{id}', [App\Http\Controllers\MasterController::class, 'delete_sitetype']); 

    Route::get('/admin/error-list', [App\Http\Controllers\MasterController::class, 'error_list'])->name('admin-error-list');
     Route::post('/admin/site-error-update', [App\Http\Controllers\MasterController::class, 'site_error_update'])->name('admin-site-error-update');

    Route::get('/admin/sites', [App\Http\Controllers\MasterController::class, 'sites'])->name('admin-sites');
    Route::post('/admin/site-store', [App\Http\Controllers\MasterController::class, 'site_store'])->name('admin-site-store');
    Route::get('/admin/site-edit/{id}', [App\Http\Controllers\MasterController::class, 'site_edit'])->name('admin-site-edit');
    Route::post('/admin/site-update', [App\Http\Controllers\MasterController::class, 'site_update'])->name('admin-site-update');
    Route::get('/admin/delete-site/{id}', [App\Http\Controllers\MasterController::class, 'delete_site']); 
    Route::get('/admin/upload-errors/{id}', [App\Http\Controllers\MasterController::class, 'site_upload_errors'])->name('admin-site-upload-errors');


    // links list
    Route::get('/admin/link-list', [App\Http\Controllers\AdminController::class, 'link_list'])->name('admin-link-list');

});