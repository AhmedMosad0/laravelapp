<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Models\Application;
use App\Models\Position;
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


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('application/create', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('application', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('application/{application}', [ApplicationController::class, 'show'])->name('application.show');
});

require __DIR__ . '/auth.php';



// Route::get('application/{application}', function (Application $application) {

//     return view('application' , [
//         'application' => $application
//     ]);
// });


// Route::get('position/{position}', function (Position $position) {


//     return view('applications' , [
//         'applications' => $position ->applicaitons()
//     ]);
// });
