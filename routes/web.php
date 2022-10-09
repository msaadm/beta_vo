<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\PrincipalController;
use \App\Http\Controllers\Admin\DistributionController;
use \App\Http\Controllers\Admin\ProductBatchController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['auth', 'verified'], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('admin.')->group(function () {

        Route::resource('principals', PrincipalController::class)
        ->only('index', 'create', 'store');

        Route::resource('principals.products', ProductController::class)
            ->only('index', 'create', 'store');
        Route::get('principals/{principal}/products/json', [ProductController::class, 'indexJson'])
            ->name('principals.products.json');

        Route::resource('distributions', DistributionController::class)
            ->only('index', 'create', 'store');

        Route::get('distributions/{distribution}/principals', [DistributionController::class, 'connectedPrincipalsGet'])
            ->name('distributions.principals.index');
        Route::get('distributions/{distribution}/principals/create', [DistributionController::class, 'connectedPrincipalsCreate'])
            ->name('distributions.principals.create');
        Route::post('distributions/{distribution}/principals', [DistributionController::class, 'connectedPrincipalsPost'])
            ->name('distributions.principals.store');

        Route::resource('distributions.principals.batches', ProductBatchController::class)
            ->only('index', 'create', 'store');
    });
});

require __DIR__.'/auth.php';
