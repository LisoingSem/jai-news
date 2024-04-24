<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\WebpageController::class, 'index'])->name('homepage');
Route::get('/detail-category={name}/id={id}', [App\Http\Controllers\WebpageController::class, 'detail'])->name('article_detail');
Route::get('/category={name}', [App\Http\Controllers\WebpageController::class, 'articleByCategory'])->name('article_by_category');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/save', [App\Http\Controllers\CategoryController::class, 'save'])->name('category.save');
Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
Route::get('/article/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit');
Route::get('/article/details/{id}', [App\Http\Controllers\ArticleController::class, 'view'])->name('article.details');
Route::post('/article/save', [App\Http\Controllers\ArticleController::class, 'save'])->name('article.save');
Route::post('/article/update', [App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');

Route::get('/ad', [App\Http\Controllers\AdController::class, 'index'])->name('ad.index');
Route::get('/ad/edit/{id}', [App\Http\Controllers\AdController::class, 'edit'])->name('ad.edit');
Route::post('/ad/save', [App\Http\Controllers\AdController::class, 'save'])->name('ad.save');
Route::post('/ad/update', [App\Http\Controllers\AdController::class, 'update'])->name('ad.update');

Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::post('/company/save', [App\Http\Controllers\CompanyController::class, 'save'])->name('company.save');
Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('/company/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/save', [App\Http\Controllers\ContactController::class, 'save'])->name('contact.save');
Route::get('/contact/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contact/update', [App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');

Route::get('/social', [App\Http\Controllers\SocialController::class, 'index'])->name('social.index');
Route::post('/social/save', [App\Http\Controllers\SocialController::class, 'save'])->name('social.save');
Route::get('/social/edit/{id}', [App\Http\Controllers\SocialController::class, 'edit'])->name('social.edit');
Route::post('/social/update', [App\Http\Controllers\SocialController::class, 'update'])->name('social.update');


