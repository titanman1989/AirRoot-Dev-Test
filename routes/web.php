<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\SendEmailController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [ImageController::class, 'index']); 
Route::get('/get-photo-user', [AlbumsController::class, 'getPhoto']); 
Route::get('/image-delete/{id}', [ImageController::class, 'imageDelete']); 
Route::post('/save-photo-album', [AlbumsController::class, 'savePhotoAlbum']); 
Route::get('/send-email', [SendEmailController::class, 'index']);
Route::get('/email', [SendEmailController::class, 'index']);

Route::resource('image', ImageController::class);
Route::resource('albums', AlbumsController::class);

