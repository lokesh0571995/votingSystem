<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NomineeController;
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


            //candidate route
            Route::get('candidate/index', [CandidateController::class, 'index'])->name('index');
            Route::get('candidate/create', [CandidateController::class, 'create'])->name('create');
            Route::post('candidate/store', [CandidateController::class, 'store'])->name('store');
            Route::get('candidate/edit/{id}', [CandidateController::class, 'edit'])->name('edit');
            Route::put('candidate/update/{id}', [CandidateController::class, 'update'])->name('update');
            Route::get('candidate/view/{id}', [CandidateController::class, 'show'])->name('show');
            Route::get('candidate/delete/{id}', [CandidateController::class, 'destroy'])->name('destroy');

            //category route
            Route::get('category/index', [CategoryController::class, 'index'])->name('index');
            Route::get('category/create', [CategoryController::class, 'create'])->name('create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('store');
            Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('category/view/{id}', [CategoryController::class, 'show'])->name('show');
            Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');

            //nominies route
            Route::get('nominie/index', [NomineeController::class, 'index'])->name('index');
            Route::get('nominie/view/{id}', [NomineeController::class, 'show'])->name('show');
            Route::get('nominie/approve/{id}', [NomineeController::class, 'approve'])->name('approve');
            Route::get('nominie/reject/{id}', [NomineeController::class, 'reject'])->name('reject');
            Route::get('nominie/delete/{id}', [NomineeController::class, 'destroy'])->name('destroy');
            Route::get('nominie/approve-nominie', [NomineeController::class, 'approveNominie'])->name('approveNominie');
            Route::get('nominie/reject-nominie', [NomineeController::class, 'rejectNominie'])->name('rejectNominie');
            
    });

