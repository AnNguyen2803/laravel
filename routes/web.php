<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\FlightController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;

use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\TransactionController;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
    
        //Menu

        Route::prefix('users')->group(function() {
            Route::get('list', [UserController::class, 'index']);
            Route::get('edit/{user}', 'App\Http\Controllers\Admin\UserController@edit')->name('admin.users.edit');
            Route::put('update/{user}', 'App\Http\Controllers\Admin\UserController@update')->name('admin.users.update');
            Route::delete('/destroy/{user}', 'App\Http\Controllers\Admin\UserController@destroy')->name('admin.users.destroy');
        });

        //Flight

        Route::prefix('flights')->group(function(){
            Route::get('add', [FlightController::class, 'create']);
            Route::post('add', [FlightController::class, 'store'])->name('flights.store');
            Route::get('list', [FlightController::class, 'index']);
            Route::get('edit/{flight}', [FlightController::class, 'show']);
            Route::post('edit/{flight}', [FlightController::class, 'update'])->name('admin.flights.update');
            Route::delete('destroy', [FlightController::class, 'destroy'])->name('admin.flights.destroy');
        });

        Route::prefix('transaction')->group(function(){
            Route::get('list', [TransactionController::class, 'index']);
            Route::get('/edit/{madatcho}', [TransactionController::class, 'edit'])->name('admin.transaction.edit');
            Route::post('/update/{madatcho}', [TransactionController::class, 'update'])->name('admin.transaction.update');
            Route::delete('destroy', [TransactionController::class, 'destroy'])->name('admin.transaction.destroy');
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
Route::post('/my-bookings', [BookingController::class, 'show'])->middleware('auth');
Route::post('/booking-process/{flight_id}', [BookingController::class, 'process'])->name('booking.process');



Route::middleware('auth')->group(function () {
    Route::get('/information', 'App\Http\Controllers\UserController@information')->name('user.information');
    Route::get('/information/edit', 'App\Http\Controllers\UserController@editInformation')->name('user.editInformation');
    Route::post('/information/update', 'App\Http\Controllers\UserController@updateInformation')->name('user.updateInformation');
});

// Pages

Route::get('thue-xe', function() {
    return view('pages.renCar');
});
Route::get('ve-may-bay', function() {
    return view('pages.flight');
});

Route::get('/blog',function()
{
    return view('blog.index');
});
Route::get('/about-us',function()
{
    return view('about.index');
});
Route::get('/policy',function()
{
    return view('policy.index');
});
Route::get('/contact',function()
{
    return view('contact.index');
});

Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment');

Route::post('/payment/process', [PaymentController::class, 'successPayment'])->name('payment.process');
Route::get('/ticket', [PaymentController::class, 'showTicketPage'])->name('ticket.page');
// Review
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create')->middleware('auth');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');