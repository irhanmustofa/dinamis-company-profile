<?php

use App\Models\Client;
use App\Models\SocialSource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\MediaSocialController;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SocialSourceController;

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
});

// Route Home
Route::get('/',[HomeController::class,'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about-home',[HomeController::class,'about'])->name('about-home');
Route::get('/homeService/{slug}',[HomeController::class,'service'])->name('service-home');
Route::get('/email-form',[HomeController::class,'emailForm'])->name('email-form');
Route::post('/kirim',[HomeController::class,'kirim'])->name('email-send');
Route::get('/blog-home',[HomeController::class,'blog'])->name('blog-home');
Route::get('/blog-detail/{id}',[HomeController::class,'blogDetail'])->name('blog-detail');

// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/home', [HomeController::class, 'index']);


// Route Auth
Route::get('/gg-admin',[AuthController::class,'index'])->name('login')->middleware('only_guest');
Route::get('/login',[AuthController::class,'index'])->name('login')->middleware('only_guest');
Route::post('/login',[AuthController::class,'login']);

// GROUPING ROUTE ADMIN DENGAN MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/dashboard',[DashboardController::class,'index']);
    
    Route::get('/hero',[HeroController::class,'index']);  
    Route::post('/hero',[HeroController::class,'store']);
    Route::get('/hero-edit',[HeroController::class,'edit']);  
    Route::put('/hero-edit/{tipe}',[HeroController::class,'update']);
    
    Route::get('/service', [ServiceController::class, 'index']);
    Route::get('/service/{slug}', [ServiceController::class, 'show']);
    Route::post('/service', [ServiceController::class, 'store']);
    Route::put('/service/{slug}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{slug}', [ServiceController::class, 'destroy']);

    Route::get('/service-item', [ServiceItemController::class, 'index']);
    Route::get('/service-item-add', [ServiceItemController::class, 'create']);
    Route::post('/service-item', [ServiceItemController::class, 'store']);
    Route::get('/service-item-edit/{slug}', [ServiceItemController::class, 'edit']);
    Route::put('/service-item-edit/{slug}', [ServiceItemController::class, 'update']);
    Route::delete('/service-item/{slug}', [ServiceItemController::class, 'destroy']);

    Route::get('/team', [TeamController::class, 'index']);
    Route::post('/team', [TeamController::class, 'store']);
    Route::put('/team/{id}', [TeamController::class, 'update']);
    Route::delete('/team/{id}', [TeamController::class, 'destroy']);

    Route::get('/testimoni', [TestimonialController::class, 'index']);
    Route::post('/testimoni', [TestimonialController::class, 'store']);
    Route::put('/testimoni/{id}', [TestimonialController::class, 'update']);
    Route::delete('/testimoni/{id}', [TestimonialController::class, 'destroy']);

    Route::get('/portofolio', [PortofolioController::class, 'index']);
    Route::post('/portofolio', [PortofolioController::class, 'store']);
    Route::put('/portofolio/{id}', [PortofolioController::class, 'update']);
    Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy']);

    Route::get('/dashboard', [LogoController::class, 'index'])->name('admin-logo');
    Route::put('/logo/{id}', [LogoController::class, 'update']);

    Route::get('/about_admin', [AboutController::class, 'index'])->name('about-admin');
    Route::post('/about', [AboutController::class, 'store']);
    Route::put('/about/{id}', [AboutController::class, 'update']);
    Route::post('/misi', [AboutController::class, 'storeMisi']);
    Route::put('/misi/{id}', [AboutController::class, 'updateMisi']);
    Route::delete('/misi/{id}', [AboutController::class, 'destroyMisi']);
    Route::post('/visi', [AboutController::class, 'storeVisi']);
    Route::put('/visi/{id}', [AboutController::class, 'updateVisi'])->name('visi.update');
    Route::delete('/visi/{id}', [AboutController::class, 'destroyVisi']);

    Route::get('/sosmed', [MediaSocialController::class, 'index']);
    Route::post('/sosmed', [MediaSocialController::class, 'store']);
    Route::put('/sosmed/{id}', [MediaSocialController::class, 'update']);
    Route::delete('/sosmed/{id}', [MediaSocialController::class, 'destroy']);

    Route::post('/sosmed-source', [SocialSourceController::class, 'store']);
    Route::put('/sosmed-source/{id}', [SocialSourceController::class, 'update']);
    Route::delete('/sosmed-source/{id}', [SocialSourceController::class, 'destroy']);

    Route::get('/client', [ClientController::class, 'index']);
    Route::post('/client', [ClientController::class, 'store']);
    Route::put('/client/{id}', [ClientController::class, 'update']);
    Route::delete('/client/{id}', [ClientController::class, 'destroy']);

    Route::get('/promotion', [PromotionController::class, 'index']);
    Route::post('/promotion', [PromotionController::class, 'store']);
    Route::put('/promotion/{id}', [PromotionController::class, 'update']);
    Route::delete('/promotion/{id}', [PromotionController::class, 'destroy']);

    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog-add', [BlogController::class, 'create']);
    Route::post('/blog-post', [BlogController::class, 'store']);
    Route::get('/blog-show/{id}', [BlogController::class, 'show']);
    Route::get('/blog-edit/{id}', [BlogController::class, 'edit']);
    Route::put('/blog-edit/{id}', [BlogController::class, 'update']);
    Route::get('/blog-delete/{id}', [BlogController::class, 'destroy']);
    
    
});



