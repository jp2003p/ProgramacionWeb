<?php

use App\Livewire\CarritoComponent;
use App\Livewire\FacturaComponent;
use App\Livewire\ClienteComponent;
use App\Livewire\PerfilComponent;
use App\Livewire\ProductoComponent;
use App\Mail\CreateFacturaMailable;
use App\Mail\RegistroBienvenidoMailable;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('inicio');

Route::middleware('auth')->group(function () {
    Route::get('/perfiles', PerfilComponent::class)->name('perfiles');
    Route::get('/facturas', FacturaComponent::class)->name('facturas');
    Route::get('/clientes', ClienteComponent::class)->name('clientes');
    Route::get('/productos', ProductoComponent::class)->name('productos');
    Route::get('/carrito', CarritoComponent::class)->name('carrito');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

