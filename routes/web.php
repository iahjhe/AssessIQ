<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouping routes that require authentication
Route::middleware('auth')->group(function () {

    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student portal route
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');

    // Teacher dashboard route
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');

    // Admin dashboard route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Teacher management routes for admins
    Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers');
 
    Route::delete('/delete_teacher/{id}', [TeacherController::class, 'delete_teacher']);
// In routes/web.php
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::get('/edit_teacher/{id}', [TeacherController::class, 'edit_teacher']);



////////////////////////
// Route to view all students
Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students');

// Route to delete a student
Route::delete('/delete_student/{id}', [StudentController::class, 'delete_student']);

// Route to edit a student (view)
Route::get('/edit_student/{id}', [StudentController::class, 'edit_student']);

// Route to update a student (PUT request)
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

});




Route::middleware(['auth', 'verified'])->group(function () {
    // Admin route to manage teachers
    Route::get('/admin/manage-teachers', [TeacherController::class, 'manageTeachers'])->name('admin.manage-teachers');
    Route::get('/admin/manage_students', [StudentController::class, 'manageStudents'])->name('admin.manage_students');


});


// Include authentication routes (login, registration, etc.)
require __DIR__.'/auth.php';


Route::get('/create_evaluation', [AdminController::class, 'create_evaluation']);
Route::post('/add_evaluation', [AdminController::class, 'add_evaluation']);
Route::get('/show_evaluation', [AdminController::class, 'show_evaluation']);

Route::get('show_feedbacks', [AdminController::class, 'showFeedbacks'])->name('show.feedbacks');
Route::get('show_reports', [AdminController::class, 'showReports'])->name('admin.showReports');

Route::post('create_teacher', [AdminController::class, 'create_teacher'])->name('create_teacher');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('student/create_evaluation', [StudentController::class, 'create_evaluation'])->name('student.create_evaluation');
    Route::post('student/add_evaluation', [StudentController::class, 'add_evaluation'])->name('student.add_evaluation');
});


