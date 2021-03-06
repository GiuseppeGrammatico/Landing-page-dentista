<?php

use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/chisiamo', [PublicController::class, 'chiSiamo'])->name('chisiamo');
Route::post('/appointment-submitted',[PublicController::class, 'appointmentSubmitted'])->name('appointmentSubmitted');