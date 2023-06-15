<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\authController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\umkmController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth2Controller;
use App\Http\Controllers\authCusController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Profile2Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UmkmRegistController;

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
Route::get('/auth/logout',[Auth2Controller::class,'logout']);


Route::prefix('dasboard')->middleware('auth')->group(
    function(){
        Route::get('/', function () {
            return view('dasboard.dasboard');
        })->name('dasboard');
        Route::resource('/halaman',halamanController::class);
        Route::get('/profiles', function () {
            return view('dasboard.profile.profile');
        });
        Route::get('/admin-lur', function () {
            return view('admin.dashboard');
        })->name('admin');
        Route::resource('/profile',ProfileController::class);
        Route::resource('/profile2',Profile2Controller::class);
        
    }
);

// routes/web.php
Route::get('/umkm',[UmkmRegistController::class,'index'])->name('umkm.admin');
Route::get('/umkm/{id}/detail',[UmkmRegistController::class, 'show']);
Route::delete('/umkm/delete/{id}',[UmkmRegistController::class, 'destroy'])->name('umkm.destroy');
Route::put('/umkm/{id}',[UmkmRegistController::class, 'update'])->name('umkm.update');

Route::get('/customer',[CustomerController::class, 'index'])->name('customer.admin');
Route::get('/customer/{id}/detail',[CustomerController::class, 'show']);
Route::delete('/customer/delete/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');
Route::put('/customer/{id}',[CustomerController::class, 'update'])->name('customer.update');

Route::get('/news',[NewsController::class, 'index']);
Route::get('/news/create',[NewsController::class, 'create']);
Route::post('/news/store',[NewsController::class, 'store']);
Route::get('/news/{id}/edit',[NewsController::class, 'edit']);
Route::put('/news/{id}',[NewsController::class, 'update']);
Route::delete('/news/{id}',[NewsController::class, 'destroy']);
Route::get('/news/detail',[NewsController::class, 'index2']);
Route::get('/news/details/{id}',[NewsController::class, 'show2']);

// Login
Route::get('/auth', [Auth2Controller::class,'showLoginForm'])->name('login')->middleware('guest');
Route::post('/auth/store', [Auth2Controller::class,'login'])->name('login.post')->middleware('guest');

// Register
Route::get('/owner/register', [Auth2Controller::class,'showRegistrationForm'])->name('register');
Route::post('/owner/register', [Auth2Controller::class,'register'])->name('register.post');
Route::get('/home',[homeController::class,'index'])->name('home.index');

Route::get('/home/umkm/{id}',[umkmController::class,'show'])->name('umkm');
Route::get('/home/umkm/detail/{id}',[umkmController::class,'show'])->name('umkm.shows');
Route::get('/home/umkm/product/{id}',[productController::class,'show'])->name('product');
Route::post('/home/umkm/detail',[productController::class,'store'])->name('product.store')->middleware('auth');



// Route::get('/chat', [MessageController::class, 'index'])->name('chat.index');
// Route::get('/chat/create/{receiver_id}', [MessageController::class, 'create'])->name('chat.create');
// Route::post('/chat/send', [MessageController::class, 'sendMessage'])->name('chat.send');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/dashboard/reply/{sender_id}', [DashboardController::class, 'show'])->name('chat.show');
Route::get('/messages/{send_id}/{receiver_id}', [DashboardController::class, 'show'])->name('messages.show');
Route::get('/inbox', [DashboardController::class, 'index']);
Route::get('/chat', [DashboardController::class, 'index4'])->name('chat');
Route::post('/chat/send/{senderId}/{receiverId}', [DashboardController::class, 'sendMessage'])->name('chat.send');

Route::get('/message/{send_id}/{receiver_id}', [DashboardController::class, 'show2'])->name('messages.shows');
Route::get('/chats', [DashboardController::class, 'index5'])->name('chats');
Route::get('/inboxs', [DashboardController::class, 'index2'])->name('inboxs');
Route::post('/chats/send/{senderId}/{receiverId}', [DashboardController::class, 'sendMessage2'])->name('chat.sends');

Route::get('/inboxss', [DashboardController::class, 'index3'])->name('inboxss');
Route::get('/chatss', [DashboardController::class, 'index6'])->name('chatss');
Route::get('/messagess/{send_id}/{receiver_id}', [DashboardController::class, 'show3'])->name('messages.showss');
Route::post('/chatss/send/{senderId}/{receiverId}', [DashboardController::class, 'sendMessage3'])->name('chat.sendss');

Route::get('/contact-us', function () {
    return view('customer.contact');
});

Route::get('/faq',[FaqController::class, 'index']);
Route::get('/faq/create',[FaqController::class, 'create']);
Route::post('/faq/store',[FaqController::class, 'store']);
Route::get('/faq/{id}/edit',[FaqController::class, 'edit']);
Route::put('/faq/{id}',[FaqController::class, 'update']);
Route::delete('/faq/{id}',[FaqController::class, 'destroy']);

