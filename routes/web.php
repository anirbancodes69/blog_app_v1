<?php

use App\Http\Controllers\BlogController;
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

// Route::get('/', function () {
//     return view('pages.blog.index');
// });

// Route::get('/show', function () {
//     return view('pages.blog.show');
// });


Route::resource('blog', BlogController::class)->only('index', 'show');

Route::get('/', fn() => redirect()->route('blog.index'));

