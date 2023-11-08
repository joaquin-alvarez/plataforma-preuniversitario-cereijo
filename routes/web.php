<?php

use App\Http\Controllers\Admin\CourseListingController;
use App\Http\Controllers\Admin\CourseStudentListingController;
use App\Http\Controllers\Admin\CourseSubjectListingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GradableAuthorizationController;
use App\Http\Controllers\Admin\StudentListingController;
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\SubjectListingController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
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

Route::permanentRedirect('/', '/logout');

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

    // RUTAS TESTING
    route::post('subir-reporte', [\App\Http\Controllers\Storage\StudentGradesReportController::class, 'store'])->name('student_grades_report.store');
    route::post('guardar-ausencia', [\App\Http\Controllers\Admin\StudentAbsenceReportController::class, 'store'])->name('student_absence_report.store');
    route::patch('actualizar-ausencia', [\App\Http\Controllers\Admin\StudentAbsenceReportController::class, 'update'])->name('student_absence_report.update');
    route::post('importar-estudiantes', [\App\Http\Controllers\Admin\UsersImportController::class, 'excel']);
    //FIN RUTAS TESTING
});

//RUTAS TESTING DOCENTE
Route::group([
    'middleware' => ['auth', 'can:navigate-as-teacher'],
    'prefix' => '/docente',
    'as' => 'teacher.',
], function () {
   route::get('/', [TeacherDashboardController::class, 'create'])->name('dashboard');
});

Route::middleware('auth')->group(function (){
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
