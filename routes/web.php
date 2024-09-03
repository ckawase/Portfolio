<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'top/index')->name('top');

//プロフィールページのview
Route::view('/about', 'about/index')->name('about');

//ワークスページのview
Route::view('/works', 'works/index')->name('works');

//カレンダーアプリのルート
Route::resource('/works/events',EventController::class)->except('create');
Route::get('/works/events/schedule/{date}', [EventController::class, 'schedule'])->name('events.schedule');
Route::get('/works/events/create/{date}', [EventController::class, 'create'])->name('events.create');


//コンタクトページのルート
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');  //完了画面


