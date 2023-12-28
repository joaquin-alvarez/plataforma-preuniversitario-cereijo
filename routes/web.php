<?php

use App\Http\Controllers\Admin\CourseListingController;
use App\Http\Controllers\Admin\CourseStudentListingController;
use App\Http\Controllers\Admin\CourseSubjectListingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StudentListingController;
use App\Http\Controllers\Admin\StudentWarningController;
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
    route::get('amonestaciones', [StudentWarningController::class, 'index'])->name('student_warnings.index');
    route::post('amonestaciones', [StudentWarningController::class, 'search'])->name('student_warnings.search');
    route::get('amonestaciones/{user}', [StudentWarningController::class, 'show'])->name('student_warnings.show');
    route::get('amonestaciones/crear', [StudentWarningController::class, 'create'])->name('student_warnings.create');
    route::post('amonestaciones/crear', [StudentWarningController::class, 'store'])->name('student_warnings.store');

    route::get('ver-cursos', [CourseListingController::class, 'create'])->name('course.index');
    route::get('administrar-materias', [\App\Http\Controllers\Admin\SubjectManagementController::class, 'create'])->name('subject_management.create');
    route::get('editar-materia/{subject}', [\App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('subject.edit');
    route::patch('editar-materia/{subject}', [\App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('subject.update');

    route::get('nuevo-usuario', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    route::post('nuevo-usuario', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    route::get('editar-usuario/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    route::patch('editar-usuario/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    route::delete('eliminar-usuario/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.delete');

    route::get('carga-de-datos', [\App\Http\Controllers\Admin\BulkUploadController::class, 'create'])->name('bulk_uploads.create');

    route::get('ver-materias', [SubjectListingController::class, 'create'])->name('subject.index');
    route::get('ver-materias/{course}', [CourseSubjectListingController::class, 'create'])->name('course.subject.index');

    route::get('ver-estudiantes', [StudentListingController::class, 'create'])->name('student.index');
    route::get('ver-estudiantes/{course}', [CourseStudentListingController::class, 'create'])->name('course.student.index');

    // RUTAS TESTING
    route::post('subir-reporte', [\App\Http\Controllers\Storage\StudentGradesReportController::class, 'store'])->name('student_grades_report.store');
    route::post('guardar-ausencia', [\App\Http\Controllers\Admin\StudentAbsenceReportController::class, 'store'])->name('student_absence_report.store');
    route::patch('actualizar-ausencia', [\App\Http\Controllers\Admin\StudentAbsenceReportController::class, 'update'])->name('student_absence_report.update');
    route::post('importar-estudiantes', [\App\Http\Controllers\Admin\UsersImportController::class, 'excel']);
    route::post('abrir-calificaciones', [\App\Http\Controllers\Admin\GradablePeriodStateController::class, 'store']);
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

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
