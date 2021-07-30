<?php

use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

Route::get('/', [PasswordController::class, 'generate']);

Route::post('/', [PasswordController::class, 'getNew'])->name('password');