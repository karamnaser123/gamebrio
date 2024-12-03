<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\checkoutrController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\GamesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\socialloginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\admin\OrderControllerAdmin;
use App\Http\Controllers\admin\filterAdminController;
use App\Http\Controllers\admin\ContactAdminController;
use App\Http\Controllers\admin\ProductControllerAdmin;
use App\Http\Controllers\admin\DiscountAdminController;
use App\Http\Controllers\admin\TypeGamesAdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

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

// Route::get('/', function () {
//   return view('welcome');
//  });

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/myorder', function () {
  return view('user.orders.s');
});
Route::get('/ord', function () {
  return view('user.orders.ord');
});



Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/change/password', [PasswordController::class, 'index'])->name('change.index');
  Route::put('change/password', [PasswordController::class, 'update'])->name('change.password');

  Route::get('cart', [cartController::class, 'index'])->name('cart');

  Route::get('ca', [cartController::class, 'SmallCart'])->name('SmallCart');


  Route::post('cart/add/{product}', [cartController::class, 'addToCart'])->name('addToCart');
  Route::get('/cart/increment/{cartItem}', [cartController::class, 'increment'])->name('cart.increment');
  Route::get('/cart/decrement/{cartItem}', [cartController::class, 'decrement'])->name('cart.decrement');
  Route::get('/cart/delete/{productId}', [cartController::class, 'destroy'])->name('deleteProductFromCart');

  Route::get('cart/count', [ProductController::class, 'getCartCount'])->name('cart.count');
  Route::delete('cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


  Route::post('/applyDiscount', [cartController::class, 'applyDiscount'])->name('applyDiscount');
  Route::post('/checkout', [cartController::class, 'checkout'])->name('checkout');
  Route::post('/saveOrderInformation', [cartController::class, 'saveOrderInformation'])->name('saveOrderInformation');
  Route::get('/paypal/success', [cartController::class, 'success'])->name('success');
  Route::post('/clearDiscount', [cartController::class, 'clearDiscount'])->name('clearDiscount');

  Route::post('review/product', [ReviewController::class, 'reviewProduct'])->name('reviewProduct');


  Route::get('/my-orders', [OrderController::class, 'index'])->name('my-orders');

  Route::get('rating/orders', [ReviewController::class, 'reviewOrders']);
  Route::post('review/orders/create', [ReviewController::class, 'reviewOrderscreate'])->name('reviewOrderscreate');
  // Route::put('review/orders/update/{order_id}', [ReviewController::class, 'reviewOrdersupdate'])->name('reviewOrdersupdate');
});

Route::get('testimonials', [ReviewController::class, 'Testimonials'])->name('testimonials');


Route::get('forget/password', [PasswordResetLinkController::class, 'create'])->name('forget.password');
Route::put('forget/password', [PasswordResetLinkController::class, 'store'])->name('password.email');


Route::get('/home', [ProductController::class, 'search'])->name('search');
Route::get('/change/password', [PasswordController::class, 'index'])->name('change.index');



Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.id');
Route::get('/product/byprice', [ProductController::class, 'getProductsbyprice'])->name('product.byprice');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactsend'])->name('contactsend');

Route::post('/contact', [HomeController::class, 'contactsend'])->name('contactsend');


Route::get('/auth/google', [socialloginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [socialloginController::class, 'handleGoogleCallback']);

Route::get('lang/en', [LanguageController::class, 'setEnglish'])->name('lang.en');
Route::get('lang/ar', [LanguageController::class, 'setArabic'])->name('lang.ar');

Route::middleware(['auth', 'usertype.admin'])->group(function () {
  Route::get('dashboard', [MainController::class, 'index'])->name('dashboard');
  Route::get('admin/products', [ProductControllerAdmin::class, 'index'])->name('admin.products');
  Route::post('admin/products/create', [ProductControllerAdmin::class, 'store'])->name('admin.product.store');
  Route::put('admin/products/update/{product}', [ProductControllerAdmin::class, 'update'])->name('admin.product.update');
  Route::get('admin/products/search', [ProductControllerAdmin::class, 'search'])->name('admin.product.search');

  Route::get('admin/orders', [OrderControllerAdmin::class, 'index'])->name('admin.orders');
  Route::post('admin/orders/create', [OrderControllerAdmin::class, 'store'])->name('admin.orders.store');
  Route::put('admin/orders/update/{orders}', [OrderControllerAdmin::class, 'update'])->name('admin.orders.update');

  Route::get('admin/filter', [filterAdminController::class, 'index'])->name('admin.filter');
  Route::post('admin/filter/create', [filterAdminController::class, 'store'])->name('admin.filter.store');
  Route::put('admin/filter/update/{filter}', [filterAdminController::class, 'update'])->name('admin.filter.update');

  Route::get('admin/typegames', [TypeGamesAdminController::class, 'index'])->name('admin.typegames');
  Route::post('admin/typegames/create', [TypeGamesAdminController::class, 'store'])->name('admin.typegames.store');
  Route::put('admin/typegames/update/{typegames}', [TypeGamesAdminController::class, 'update'])->name('admin.typegames.update');

  Route::get('admin/discount', [DiscountAdminController::class, 'index'])->name('admin.discount');
  Route::post('admin/discount/create', [DiscountAdminController::class, 'store'])->name('admin.discount.store');
  Route::put('admin/discount/update/{discount}', [DiscountAdminController::class, 'update'])->name('admin.discount.update');
  Route::delete('admin/discount/{id}', [DiscountAdminController::class, 'destroy'])->name('admin.discount.destroy');

  Route::get('admin/contact', [ContactAdminController::class, 'index'])->name('admin.contact');
  Route::delete('admin/contact/{id}', [ContactAdminController::class, 'destroy'])->name('admin.destroy');

  Route::get('admin/users', [UsersController::class, 'index'])->name('admin.users');
  Route::put('admin/users/{users}', [UsersController::class, 'update'])->name('admin.users.update');


  Route::get('admin/games', [GamesController::class, 'index'])->name('admin.games');
  Route::post('admin/games/create', [GamesController::class, 'store'])->name('admin.games.store');
  Route::put('admin/games/update/{games}', [GamesController::class, 'update'])->name('admin.games.update');
});



require __DIR__ . '/auth.php';
