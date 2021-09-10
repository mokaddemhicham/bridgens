<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ChaptersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ProfileController;

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

//  ------------------------------- Events ----------------------------------

Route::get('/events', [EventsController::class , 'userIndex'])->name('events');

Route::get('/event/{slug}', [EventsController::class , 'show'])->name('event');

Route::get('/', [EventsController::class, 'sliderShow']);

//  ------------------------------- formations ----------------------------------

Route::get('/formations', [FormationsController::class, 'userIndex'])->name('formations');

Route::get('/formation/{slug}', [FormationsController::class , 'show'])->name('formation');

//  ------------------------------- courses ----------------------------------

Route::get('/courses', [CoursesController::class, 'userIndex'])->name('courses');

Route::get('/course/{slug}', [CoursesController::class , 'show'])->name('course');

//  ------------------------------- Team ----------------------------------

Route::get('/team', [TeamController::class, 'userIndex'])->name('team');

//  ------------------------------- partners ----------------------------------

Route::get('/partners', [PartnersController::class, 'userIndex'])->name('partners');

//  ------------------------------- About us ----------------------------------

Route::get('/about-us', [AboutUsController::class , 'index'])->name('about');

//  ------------------------------- contact ----------------------------------

Route::get('/contact', [ContactController::class , 'index'])->name('contact');

Route::post('/sendMessage', [ContactController::class , 'sendEmail'])->name('contact.send');

//  ############################  Admin side  ##################################

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function () {

    // ------------------------------- events ---------------------------------

    Route::get('/admin/events', [EventsController::class , 'index'])->name('admin.events');

    Route::get('/dashboard', [EventsController::class, 'dashboard'])->name('dashboard');

    Route::post('/insert/event', [EventsController::class , 'insert'])->name('insert.event');

    Route::put('/update/event/{id}', [EventsController::class, 'update'])->name('update.event');

    Route::delete('/delete/event/{id}', [EventsController::class, 'delete'])->name('delete.event');

    // ------------------------------- formations ---------------------------------
    
    Route::get('/admin/formations', [FormationsController::class , 'index'])->name('admin.formations');

    Route::post('/insert/formation', [FormationsController::class , 'insert'])->name('insert.formation');

    Route::put('/update/formation/{id}', [FormationsController::class, 'update'])->name('update.formation');

    Route::delete('/delete/formation/{id}', [FormationsController::class, 'delete'])->name('delete.formation');
    
    // ------------------------------- Team ---------------------------------
    
    Route::get('/admin/team', [TeamController::class , 'index'])->name('admin.team');

    Route::post('/insert/member', [TeamController::class, 'insert'])->name('insert.member');

    Route::put('/update/member/{id}', [TeamController::class, 'update'])->name('update.member');

    Route::delete('/delete/member/{id}', [TeamController::class, 'delete'])->name('delete.member');

    Route::get('/admin/teampdf', [TeamController::class, 'getMembers'])->name('getMembers');

    Route::get('/admin/downloadPDF', [TeamController::class, 'downloadPDF'])->name('downloadPDF');

    // ------------------------------- partners ---------------------------------
    
    Route::get('/admin/partners', [PartnersController::class, 'index'])->name('admin.partners');

    Route::post('/insert/partner', [PartnersController::class, 'insert'])->name('insert.partner');

    Route::put('/update/partner/{id}', [PartnersController::class, 'update'])->name('update.partner');

    Route::delete('/delete/partner/{id}', [PartnersController::class, 'delete'])->name('delete.partner');

// ---------------------------------------- Courses ------------------------------------------------- //

    Route::get('/admin/courses', [CoursesController::class, 'index'])->name('admin.courses');

    Route::post('/insert/course', [CoursesController::class , 'insert'])->name('insert.course');

    Route::put('/update/course/{id}', [CoursesController::class, 'update'])->name('update.course');

    Route::delete('/delete/course/{id}', [CoursesController::class, 'delete'])->name('delete.course');

    Route::get('/admin/course/{id}', [CoursesController::class , 'showCourse'])->name('admin.course');

    // ............................... course .............................

    // --------------- file ------------------

    Route::post('/admin/insert/{coursID}/file', [DocumentsController::class , 'insertFile'])->name('insert.file.document');
    Route::put('/admin/{coursID}/{id}/file/update', [DocumentsController::class , 'updateFile'])->name('update.File.document');
    Route::delete('/admin/{coursID}/{id}/file/delete', [DocumentsController::class , 'deleteFile'])->name('delete.File.document');

     // --------------- video ------------------

    Route::post('/admin/insert/{coursID}/video', [DocumentsController::class , 'insertVideo'])->name('insert.video.document');
    Route::put('/admin/{coursID}/{id}/video/update', [DocumentsController::class , 'updateVideo'])->name('update.video.document');
    Route::delete('/admin/{coursID}/{id}/video/delete', [DocumentsController::class , 'deleteVideo'])->name('delete.video.document');

     // --------------- text ------------------
    
    Route::post('/admin/insert/{coursID}/text', [DocumentsController::class , 'insertText'])->name('insert.text.document');
    Route::put('/admin/{coursID}/{id}/text/update', [DocumentsController::class , 'updateText'])->name('update.text.document');
    Route::delete('/admin/{coursID}/{id}/text/delete', [DocumentsController::class , 'deleteText'])->name('delete.text.document');

     // ............................... chapitres .............................
    
    Route::post('/admin/add/chapter/{id}',[ChaptersController::class, 'insertChapter'])->name('insert.chapter');
    Route::put('/admin/update/chapter/{id}/{chapterID}',[ChaptersController::class, 'updateChapter'])->name('update.chapter');
    Route::delete('/admin/delete/chapter/{id}/{chapterID}',[ChaptersController::class, 'deleteChapter'])->name('delete.chapter');




    Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');

    Route::put('/admin/profile', [ProfileController::class, 'updateProfile'])->name('update.admin.profile');

    Route::post('/admin/profile/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');

    
});



require_once __DIR__ . '/jetstream.php';