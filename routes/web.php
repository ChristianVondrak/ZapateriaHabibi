<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/pedidos', PedidoController::class)->middleware(['auth', 'verified']);
require __DIR__ . '/auth.php';

Route::get('pedidos/create/{id?}', [PedidoController::class, 'create'])->middleware(['auth', 'verified'])
    ->name('create_pedido')->middleware(['auth', 'verified']);

Route::post('pedidos/create', [PedidoController::class, 'store'])->middleware(['auth', 'verified']);

Route::resource('/clientes', ClienteController::class)->middleware(['auth', 'verified']);

Route::get('clientes/create', [ClienteController::class, 'create'])->middleware(['auth', 'verified'])
    ->name('create_cliente');

Route::post('clientes/create', [ClienteController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('pedidos/edit/{id}', [PedidoController::class, 'edit'])->middleware(['auth', 'verified'])
    ->name('edit_pedido')->middleware(['auth', 'verified']);

Route::post('pedidos/update/{id}', [PedidoController::class, 'update'])->name('update_pedido')->middleware(['auth', 'verified']);

Route::get('pedidos/delete/{id}', [PedidoController::class, 'destroy'])->middleware(['auth', 'verified'])
    ->name('delete_pedido')->middleware(['auth', 'verified']);

Route::get('clientes/delete/{id}', [ClienteController::class, 'destroy'])->middleware(['auth', 'verified'])
    ->name('delete_cliente')->middleware(['auth', 'verified']);
