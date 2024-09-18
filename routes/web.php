<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('item/{id}/update', [ItemController::class, 'itemForm']);
Route::get('/qr', function (Request $request) {
    return QrCode::generate('hii');
});