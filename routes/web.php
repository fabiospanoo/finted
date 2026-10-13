<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/index', [ArticleController::class, 'index'])->name('tutti-gli-articoli');   
Route::get('/create-article', [ArticleController::class, 'create'])->name('crea-articolo');   
Route::get('/show-article/{article}', [ArticleController::class, 'show'])->name('mostra-articolo');
Route::get('/byCategory/{category}', [ArticleController::class, 'byCategory'])->name('categoria');
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}',[RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}',[RevisorController::class, 'reject'])->name('reject');

Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');