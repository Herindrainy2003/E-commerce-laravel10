<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\slidersController;
use  App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\commandesController;
use App\Http\Controllers\pdfController;

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

Route::get('/', [clientcontroller::class,'home']);
Route::get('/acheter', [admincontroller::class,'commandes']);
Route::get('/shop', [clientcontroller::class,'shop']);
Route::get('cart', [clientcontroller::class,'cart']);
Route::get('/panier', [clientcontroller::class,'panier']);
Route::get('checkout', [clientcontroller::class,'checkout']);
Route::get('admin',[adminController::class,'dashboard']);
Route::get('ajouterCategories',[adminController::class,'ajouterCategories']);
Route::get('afficherCategories',[adminController::class,'afficherCategories']);
Route::get('ajouterProduit',[adminController::class,'ajouterProduit']);
Route::get('afficherProduit',[adminController::class,'afficherProduit']);
Route::get('afficherSliders',[adminController::class,'affichersliders']);
Route::get('activerslider/{id}',[adminController::class,'activerslider']);
Route::get('desactiverslider/{id}',[adminController::class,'desactiverslider']);
Route::get('ajouterSliders',[adminController::class,'ajoutersliders']);
Route::get('achat',[adminController::class,'commandes']);
Route::get('login',[adminController::class,'login']);
Route::get('signup',[adminController::class,'signup']);
Route::get('desactiverproduit/{id}',[adminController::class,'desactiverproduit']);
Route::get('/activerproduit/{id}',[adminController::class,'activerproduit']);
Route::resource('produits',produitController::class);
Route::resource('sliders',slidersController::class);
Route::resource('categories',categoryController::class); 
Route::resource('commandes',commandesController::class); 
Route::get('selectionParCategories/{nomcategorie}',[clientController::class,'selectionParCategories']);
// Route::get('ajouterCart/{id}',[clientController::class,'ajouterCart']);
// Route::post('modifier_qty/{id}',[clientController::class,'modifierCart']);
// Route::patch('update-cart', [clientController::class, 'update'])->name('update.cart');

// Route::delete('remove-from-cart', [clientController::class, 'remove'])->name('remove.from.cart');

// Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe', 'stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });

Route::post('/session',[StripePaymentController::class,'session'])->name('session'); 
Route::get('success',[StripePaymentController::class,'success'])->name('success');
Route::get('cancel',[StripePaymentController::class,'cancel'])->name('cancel');
Route::get('/product/{id}', [ProductController::class, 'addProducttoCart'])->name('addProduct.to.cart');
Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [ProductController::class, 'deleteProduct'])->name('delete.cart.product');
Route::get('ajouterCart/{id}', [clientController::class, 'ajouterCart'])->name('add.to.cart');
// Route::post('creerCompte',[adminController::class,'creerCompte'])
Route::patch('update-cart', [clientController::class, 'update'])->name('update.cart');

Route::delete('remove-from-cart', [clientController::class, 'remove'])->name('remove.from.cart');
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
Route::get('generate-pdf/{id}', [pdfController::class, 'generatePDF']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
