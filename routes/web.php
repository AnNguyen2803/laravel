<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\CarRentalController;
use \App\Http\Controllers\Admin\FlightController;
use \App\Http\Controllers\Admin\HotelController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\BookingController;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
    
        //Menu
        Route::prefix('menus')->group(function() {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);

        });

        //Flight

        Route::prefix('flights')->group(function(){
            Route::get('add', [FlightController::class, 'create']);
            Route::post('add', [FlightController::class, 'store'])->name('flights.store');
            Route::get('list', [FlightController::class, 'index']);
            Route::get('edit/{flight}', [FlightController::class, 'show']);
            Route::post('edit/{flight}', [FlightController::class, 'update']);
            Route::delete('destroy', [FlightController::class, 'destroy']);
        });

        // Route::prefix('sliders')->group(function(){
        //     Route::get('add', [SliderController::class, 'create']);
        //     Route::post('add', [SliderController::class, 'store']);
        //     Route::get('list', [SliderController::class, 'index']);
        //     Route::get('edit/{slider}', [SliderController::class, 'show']);
        //     Route::post('edit/{slider}', [SliderController::class, 'update']);
        //     Route::DELETE('destroy', [SliderController::class, 'destroy']);
        // });

        
        Route::prefix('carRental')->group(function(){
            Route::get('add', [CarRentalController::class, 'create']);
            Route::post('add', [CarRentalController::class, 'store']);
            Route::get('list', [CarRentalController::class, 'index']);
            Route::get('edit/{slider}', [CarRentalController::class, 'show']);
            Route::post('edit/{slider}', [CarRentalController::class, 'update']);
            Route::DELETE('destroy', [CarRentalController::class, 'destroy']);
        });

        Route::prefix('hotel')->group(function(){
            Route::get('add', [HotelController::class, 'create']);
            Route::post('add', [HotelController::class, 'store']);
            Route::get('list', [HotelController::class, 'index']);
            Route::get('edit/{slider}', [HotelController::class, 'show']);
            Route::post('edit/{slider}', [HotelController::class, 'update']);
            Route::DELETE('destroy', [HotelController::class, 'destroy']);
        });



        //Upload

        Route::post('upload/services', [UploadController::class, 'store']);
    });

});


// Xử lý đăng kí đăng nhập
Route::get('login', [\App\Http\Controllers\Users\LoginController::class, 'index']);
Route::post('login', [\App\Http\Controllers\Users\LoginController::class, 'login']);
Route::get('register', [\App\Http\Controllers\Users\RegisterController::class, 'index']);
Route::post('register', [\App\Http\Controllers\Users\RegisterController::class, 'store']);
Route::post('logout', [\App\Http\Controllers\Users\LoginController::class, 'logout'])->name('logout');

Route::get('/', [\App\Http\Controllers\MainController::class , 'index']);
Route::post('/booking-submit', [BookingController::class, 'submitBooking'])->name('booking.submit');