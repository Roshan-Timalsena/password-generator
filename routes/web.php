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

//Route for Password Starts here
Route::get('/', [PasswordController::class, 'generate'])->name('password-main');
Route::post('/', [PasswordController::class, 'getNew'])->name('password');
//Routes for Password Ends Here

//Routes for Encryption Starts Here

Route::get('/encrypt', function () {
    return view('Form.encryption-page');
})->name('encrypt-main');
Route::get('/encryption',[App\Http\Controllers\encryptController::class, 'encryptionPage']) ->name('page.encrypt');
Route::get('/validation',[App\Http\Controllers\encryptController::class, 'validationPage']) ->name('page.validate');


// Encryption
Route::post('/encryption',[App\Http\Controllers\encryptController::class, 'Encryptions']) ->name('encryption');
Route::get('/encryption-md5/{algorithms}',[App\Http\Controllers\encryptController::class, 'md5']) ->name('encrypt.md5');
Route::get('/encrypted-sha1/{algorithms}',[App\Http\Controllers\encryptController::class, 'sha1']) ->name('encrypt.sha1');
Route::get('/encrypted-base64/{algorithms}',[App\Http\Controllers\encryptController::class, 'base64']) ->name('encrypt.base64');
Route::get('/encrypted-bcrypt/{algorithms}',[App\Http\Controllers\encryptController::class, 'bcrypt']) ->name('encrypt.bcrypt');
Route::view('/submit','submit');

// Validation
Route::post('/validation',[App\Http\Controllers\encryptController::class, 'Validations']) ->name('validation');
Route::get('/validate-md5/{algorithms}',[App\Http\Controllers\encryptController::class, 'functionForMd5']) ->name('md5.validation');
Route::get('/validate-sha1/{algorithms}',[App\Http\Controllers\encryptController::class, 'functionForSha1']) ->name('sha1.validation');
Route::get('/validate-base64/{algorithms}',[App\Http\Controllers\encryptController::class, 'functionForBase64']) ->name('base64.validation');
Route::get('/validate-bcrypt/{algorithms}',[App\Http\Controllers\encryptController::class, 'functionForBcrypt']) ->name('bcrypt.validation');
Route::view('/submit','submit');


