<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgronomyController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\Signaturecontroller;
use App\Http\Controllers\SendController;
use Twilio\Rest\Client;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('store_add', [AgronomyController::class, 'store_add'])->name('store_add');
// Route::post('/store-add', [AgronomyController::class, 'store_add'])->name('store_add');


//1)Agronomy add details
Route::get('/agronomy_view', [AgronomyController::class, 'agronomy_view'])->name("agronomy_view");
Route::post('/store_agronomy', [AgronomyController::class, 'store'])->name("store_agronomy");

//2)update code agronomy

Route::get('/agronomy/edit/{id}', [AgronomyController::class, 'agronomy_edit'])->name('agronomy_edit');
Route::put('/agronomy/update/{id}', [AgronomyController::class, 'agronomy_update'])->name('agronomy_update');

//3)list code and delete
Route::get('/agronomy', [AgronomyController::class, 'list'])->name('list');
Route::delete('/agronomy/{id}', [AgronomyController::class, 'agronomy_delete'])->name('agronomy_delete');


//1)add capacity detalils                             
Route::get('/capacity_view', [CapacityController::class, 'capacity_view'])->name("capacity_view");
Route::post('/store_capacity', [CapacityController::class, 'store_capacity'])->name("store_capacity");

//2)update capacity
Route::get('/capacity/edit/{id}', [CapacityController::class, 'edit'])->name('edit');
Route::put('/capacity/update/{id}', [CapacityController::class, 'update'])->name('update');

//3) list show and delete
Route::get('/capacity', [CapacityController::class, 'list'])->name('list');
Route::delete('/capacity/{id}', [CapacityController::class, 'delete'])->name('delete');


//new add form to signature
Route::get('/signature_view', [Signaturecontroller::class, 'signature_view'])->name("signature_view");
Route::post('/store_signature', [Signaturecontroller::class, 'store_signature'])->name("store_signature");

//update code to signature
Route::get('/signature_edit/{id}', [Signaturecontroller::class, 'signature_edit'])->name('signature_edit');
Route::put('/signature_update/{id}', [Signaturecontroller::class, 'signature_update'])->name('signature_update');

//this is list and delete
Route::get('/signature', [Signaturecontroller::class, 'list'])->name('list');
Route::delete('/signature/{id}', [Signaturecontroller::class, 'signature_delete'])->name('signature_delete');


//this send otp code
Route::get('/sendview', [SendController::class, 'sendview'])->name("sendview");
Route::post('/send-otp', [SendController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [SendController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/storesendotp', [SendController::class, 'storesendotp'])->name('storesendotp');
