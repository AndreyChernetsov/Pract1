<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])
    ->middleware('right');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/addsubscribers', [Controller\Site::class, 'addsubscribers'])
    ->middleware('auth');;
Route::add('GET', '/addphone', [Controller\Site::class, 'addphone']);
Route::add('GET', '/subphone', [Controller\Site::class, 'subphone']);
Route::add('GET', '/addroom', [Controller\Site::class, 'addroom']);
Route::add('GET', '/adddepartment', [Controller\Site::class, 'adddepartment']);