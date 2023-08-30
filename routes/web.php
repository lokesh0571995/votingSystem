<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\VoterController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\NomineeController;
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

Route::get('/home', function () {
    return view('frontend/home');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('voter/login', [VoterController::class, 'createLogin'])->name('createLogin');
Route::post('voter/login', [VoterController::class, 'Login'])->name('Login'); 
Route::get('voter/register', [VoterController::class, 'registration'])->name('registration');
Route::post('voter/post-registration', [VoterController::class, 'postRegistration'])->name('postRegistration');

Route::group(['middleware' => ['auth','users']], function() {

    Route::get('voter/logout', [VoterController::class, 'logout'])->name('logout');

    /**
     * update profile Routes
     */
    Route::get('voter/edit-profile/{id}', [VoterController::class, 'edit'])->name('edit');
    Route::post('voter/update-profile/{id}', [VoterController::class, 'update'])->name('update');
        /**
     * change password Routes
     */
    Route::get('voter/change-password/{id}', [VoterController::class, 'changePassword'])->name('chnage-password');
    Route::post('voter/update-password/{id}', [VoterController::class, 'updatePassword'])->name('update-password');


    Route::get('nimination/list', [NomineeController::class, 'index'])->name('index');
    Route::post('candidate/add', [NomineeController::class, 'nomineeAdd'])->name('nomineeAdd');

});



