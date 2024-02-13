<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get('/',[HomeController::class,'index']);
Route::controller(HomeController::class)->middleware(['auth','verified'])->group(function(){
    Route::get('/home','redirect');
    Route::post('/appointment','appointment')->name('appointment');
    Route::get('/myAppointment','myAppointment')->name('myAppointment')->middleware('auth');
    Route::delete('/cancleAppointment/{appointment}','cancleAppointment')->name('cancleAppointment')->middleware('auth');

})->middleware(['auth','verified']);

Route::controller(AdminController::class)->middleware(['auth','verified','can:access_admin_dashboard'])->group(function(){
    Route::get('/addDoctor', 'showAddDoctor')->name('admin.addDoctor');
    Route::post('/addDoctor', 'uploadAddDoctor')->name('admin.adDDoctor');
    Route::get('/appointments','showAppointments')->name('admin.appointments');
    Route::put('/approvedAppointment/{appointment}','approvedAppointment')->name('approvedAppointment');
    Route::put('/cancleAAppointment/{appointment}','cancleAAppointment')->name('cancleAAppointment');
    Route::get('/doctors','showDoctors')->name('admin.doctors');
    Route::get('/editDoctor','editDoctor')->name('admin.editDoctor');
    Route::put('/updateDoctor','updateDoctor')->name('admin.updateDoctor');
    Route::delete('deletedDoctor/{doctor}','deleteDoctor')->name('admin.deletedDoctor');
    Route::get('/sendEmailToUser/{appointment}','sendEmailToUser');
    Route::post('/sendEmailNotificationToUser/{appointment}','sendEmailNotificationToUser')->name('emailNotification');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
