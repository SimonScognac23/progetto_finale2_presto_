<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\PublicController;
 use App\Http\Controllers\ArticleController;
 use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RevisorController;



Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article')->middleware('auth');


Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');


Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');






Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');


Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');