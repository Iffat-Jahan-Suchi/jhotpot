<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JhotapotController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutInformationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboard;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordRecoveryController;


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

Route::get('/',[JhotapotController::class,'index'])->name('home');
Route::get('/category-product/{id}',[JhotapotController::class,'categoryProduct'])->name('category-product');
Route::get('/product-detail/{id}',[JhotapotController::class,'productDetail'])->name('product-detail');
Route::post('/search-product',[JhotapotController::class,'search'])->name('search-product');
//front-cart
Route::post('/add-to-cart/{id}',[CartController::class,'index'])->name('add-to-cart');
Route::get('/show-cart',[CartController::class,'show'])->name('show-cart');
Route::get('/delete-cart-item/{id}',[CartController::class,'delete'])->name('delete-cart-item');
Route::post('/update-cart-product/{id}',[CartController::class,'update'])->name('update-cart-product');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'newOrder'])->name('new-order');
Route::post('/checkout',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');



//static portion of footer-about us
Route::get('/about-information',[AboutInformationController::class,'aboutUs'])->name('about-information');
Route::get('/delivery-info',[AboutInformationController::class,'deliveryInfo'])->name('delivery-info');
Route::get('/privacy-policy',[AboutInformationController::class,'privacyPolicy'])->name('privacy-policy');

//customer login logout register

Route::get('/customer-logout',[AuthController::class,'logout'])->name('customer-logout');
Route::get('/customer-login',[AuthController::class,'login'])->name('customer-login');
Route::get('/customer-register',[AuthController::class,'register'])->name('customer-register');
Route::post('/new-customer-login',[AuthController::class,'newLogin'])->name('new-customer-login');


/*Route::get('/customer-forget-password',[AuthController::class,'forgetPassword'])->name('customer-forget-password');
Route::post('/forget-password-mail-send',[AuthController::class,'forgetPasswordMail'])->name('forget-password-mail-send');
Route::get('/forget-password-verification-link',[AuthController::class,'passwordRecover'])->name('forget-password-verification-link');
Route::post('/forget-password-update',[AuthController::class,'updatePassword'])->name('forget-password-update');
Route::get('/forget-password-mail-send-view',[AuthController::class,'viewMail'])->name('forget-password-mail-send-view');

Route::post('/new-customer-register',[AuthController::class,'newRegister'])->name('new-customer-register');*/

//recovery password with mail

Route::get('/customer-forget-password',[PasswordRecoveryController::class,'forgetPassword'])->name('customer-forget-password');
Route::post('/password-mail-send',[PasswordRecoveryController::class,'forgetPasswordMailSend'])->name('password-mail-send');
Route::get('/forget-password-mail-send-view',[PasswordRecoveryController::class,'viewMail'])->name('forget-password-mail-send-view');
Route::get('/forget-password-verified-link',[PasswordRecoveryController::class,'forgetPasswordLink'])->name('forget-password-verified-link');
Route::post('/forget-password-update',[PasswordRecoveryController::class,'updateForgetPassword'])->name('forget-password-update');






//customer dashboard
Route::middleware(['customer'])->get('/customer-dashboard',[CustomerDashboard::class,'index'])->name('customer-dashboard');
Route::middleware(['customer'])->get('/customer-change-password',[CustomerDashboard::class,'changePassword'])->name('customer-change-password');
Route::middleware(['customer'])->post('/customer-update-password',[CustomerDashboard::class,'customerUpdatePassword'])->name('customer-update-password');


//error

Route::get('/errors',[AuthController::class,'error'])->name('error-page');


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
//admin login page
Route::get('/user-logout',[LogoutController::class, 'logout'])->name('user-logout');

//admin dashboard

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//category module
Route::middleware(['auth:sanctum', 'verified'])->get('/add-category',[CategoryController::class, 'index'])->name('add-category');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-category',[CategoryController::class, 'create'])->name('new-category');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-category',[CategoryController::class, 'manage'])->name('manage-category');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-category/{id}',[CategoryController::class, 'edit'])->name('edit-category');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-category/{id}',[CategoryController::class, 'update'])->name('update-category');
Route::middleware(['auth:sanctum', 'verified'])->post('/delete-category/{id}',[CategoryController::class, 'delete'])->name('delete-category');


//brand module

Route::middleware(['auth:sanctum', 'verified'])->get('/add-brand',[BrandController::class, 'index'])->name('add-brand');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-brand',[BrandController::class, 'create'])->name('new-brand');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-brand',[BrandController::class, 'manage'])->name('manage-brand');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-brand/{id}',[BrandController::class, 'edit'])->name('edit-brand');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-brand/{id}',[BrandController::class, 'update'])->name('update-brand');
Route::middleware(['auth:sanctum', 'verified'])->post('/delete-brand/{id}',[BrandController::class, 'delete'])->name('delete-brand');

//Unit module

Route::middleware(['auth:sanctum', 'verified'])->get('/add-unit',[UnitController::class, 'index'])->name('add-unit');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-unit',[UnitController::class, 'create'])->name('new-unit');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-unit',[UnitController::class, 'manage'])->name('manage-unit');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-unit/{id}',[UnitController::class, 'edit'])->name('edit-unit');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-unit/{id}',[UnitController::class, 'edit'])->name('edit-unit');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-unit/{id}',[UnitController::class, 'update'])->name('update-unit');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete-unit/{id}',[UnitController::class, 'delete'])->name('delete-unit');

//product module

Route::middleware(['auth:sanctum', 'verified'])->get('/add-product',[ProductController::class, 'index'])->name('add-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/get-brand-by-category',[ProductController::class, 'getbrandbycategory'])->name('get-brand-by-category');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-product',[ProductController::class, 'create'])->name('new-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-product',[ProductController::class, 'manage'])->name('manage-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-product/{id}',[ProductController::class, 'edit'])->name('edit-product');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-product/{id}',[ProductController::class, 'update'])->name('update-product');
Route::middleware(['auth:sanctum', 'verified'])->post('/delete-product/{id}',[ProductController::class, 'delete'])->name('delete-product');


//manage order

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-manage-order',[AdminOrderController::class, 'manage'])->name('admin-manage-order');
Route::middleware(['auth:sanctum', 'verified'])->get('/view-order-detail/{id}',[AdminOrderController::class, 'viewOrderDetail'])->name('view-order-detail');
Route::middleware(['auth:sanctum', 'verified'])->get('/invoice-order/{id}',[AdminOrderController::class, 'invoice'])->name('invoice-order');
Route::middleware(['auth:sanctum', 'verified'])->get('/download-invoice/{id}',[AdminOrderController::class, 'dlownloadInvoice'])->name('download-invoice');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-order/{id}',[AdminOrderController::class, 'editOrder'])->name('edit-order');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-order-info/{id}',[AdminOrderController::class, 'updateOrderInfo'])->name('update-order-info');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin-delete-order/{id}',[AdminOrderController::class, 'adminDeleteOrder'])->name('admin-delete-order');


//user module

Route::middleware(['auth:sanctum', 'verified'])->get('/add-user',[UserController::class, 'index'])->name('add-user');
Route::middleware(['auth:sanctum', 'verified'])->post('/add-new-user',[UserController::class, 'create'])->name('add-new-user');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-user',[UserController::class, 'manage'])->name('manage-user');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-user/{id}',[UserController::class, 'edit'])->name('edit-user');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-user/{id}',[UserController::class, 'update'])->name('update-user');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete-user/{id}',[UserController::class, 'delete'])->name('delete-user');



//profile controller

Route::middleware(['auth:sanctum', 'verified'])->get('/change-admin-password',[ProfileController::class, 'changePAssword'])->name('change-admin-password');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-admin-password',[ProfileController::class, 'newPassword'])->name('admin-new-password');
