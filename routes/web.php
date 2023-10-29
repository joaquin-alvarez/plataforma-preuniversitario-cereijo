<?php

use App\Http\Controllers\Admin\CourseListingController;
use App\Http\Controllers\Admin\CourseStudentListingController;
use App\Http\Controllers\Admin\CourseSubjectListingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GradableAuthorizationController;
use App\Http\Controllers\Admin\StudentListingController;
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\SubjectListingController;
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
})->middleware('auth');

Route::group([
    'middleware' => ['auth', 'can:navigate-as-admin'],
    'prefix' => '/administrador',
    'as' => 'admin.',
], function () {
    route::get('/', [AdminDashboardController::class, 'create'])->name('dashboard');
    route::get('ver-cursos', [CourseListingController::class, 'create'])->name('course.index');
    // route::get('gestionar-curso/{course}', [CourseManagementController::class, 'create'])->name('course.edit');
    // route::put('gestionar-curso', [CourseManagementController::class, 'update'])->name('course.update');

    route::get('ver-materias', [SubjectListingController::class, 'create'])->name('subject.index');
    route::get('ver-materias/{course}', [CourseSubjectListingController::class, 'create'])->name('course.subject.index');

    route::get('ver-estudiantes', [StudentListingController::class, 'create'])->name('student.index');
    route::get('ver-estudiantes/{course}', [CourseStudentListingController::class, 'create'])->name('course.student.index');
    route::get('gestionar-estudiante/{user}', [StudentManagementController::class, 'create'])->name('student.edit');

    route::put('gestionar-calificables', [GradableAuthorizationController::class, 'update'])->name('gradable.update');

    //route::post('subir-archivo', [\App\Http\Controllers\Storage\UserFileController::class, 'store'])->name('file.store');
});

Route::middleware('auth')->group(function (){
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
