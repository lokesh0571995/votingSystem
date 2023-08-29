<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VoterController;
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
        Route::get('admin/login', function () {
            return redirect()->route('admin/login');
        });

        /**
         * Login Routes
         */
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/create-login', [AdminController::class, 'createLogin'])->name('create-login');

        Route::group(['middleware' => ['auth']], function() {
            /**
             * Logout Routes
             */
            Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
            /**
             * update profile Routes
             */
            Route::get('/edit-profile/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/update-profile/{id}', [AdminController::class, 'update'])->name('update');
             /**
             * change password Routes
             */
            Route::get('/change-password/{id}', [AdminController::class, 'changePassword'])->name('chnage-password');
            Route::post('/update-password/{id}', [AdminController::class, 'updatePassword'])->name('update-password');

            Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');


            //voter route
            Route::get('voter/index', [VoterController::class, 'index'])->name('index');
            Route::get('voter/create', [VoterController::class, 'create'])->name('create');
            Route::post('voter/store', [VoterController::class, 'store'])->name('store');
            Route::get('voter/edit/{id}', [VoterController::class, 'edit'])->name('edit');
            Route::post('voter/update/{id}', [VoterController::class, 'update'])->name('update');
            Route::get('voter/view/{id}', [VoterController::class, 'view'])->name('view');
            Route::get('voter/delete/{id}', [VoterController::class, 'destroy'])->name('destroy');
            
    });

