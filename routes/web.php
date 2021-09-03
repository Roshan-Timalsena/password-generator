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

// Route::get('/lorem', function () {
//     // return view('password', ['password'=>""]);
//     $length = 50;
//     $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

//     $str = '';
//     $max = strlen($keyspace) - 1;
//     if ($max < 1) {
//         // throw new Exception('$keyspace must be at least two characters long');
//         echo "Some error";
//     }
//     for ($i = 0; $i < $length; ++$i) {
//         $str .= $keyspace[random_int(0, $max)];
//     }
//     echo $str;
// });
