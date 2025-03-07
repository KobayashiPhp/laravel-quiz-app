<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
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
//     return view('welcome');
// });
Route::get('/', [QuizController::class, 'index'])->name('quizzes.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::get('/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::put('/{quiz}', [QuizController::class, 'update'])->name('quiz.update');
    Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
    Route::delete('/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy');
});



require __DIR__.'/auth.php';
