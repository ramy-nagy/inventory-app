<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StoreController;
use App\Models\Inventory;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

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
   
    $stores = Store::get(['id', 'name']);
    return view('welcome', compact('stores'));
});
if (Features::enabled(Features::twoFactorAuthentication())) {
    Route::post('/store-two-factor-login', [StoreController::class, 'store_two_factor'])->name('store-two-factor.login');
}
Route::get('/frontend/dashboard/{id}/{passcode}', function ($id, $passcode) {
    $store =   Store::where(['id' => $id, 'passcode' =>$passcode])->firstOrFail();
    return view('frontend.dashboard', compact('store'));
})->name('frontend.dashboard');

Route::post('/upload-xlsx-to-inventory', [InventoryController::class, 'store'])->name('upload-xlsx-to-inventory');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
