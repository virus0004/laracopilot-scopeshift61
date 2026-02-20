<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BicicletaController;
use App\Http\Controllers\Admin\ReservaController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PagamentoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\PublicController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/frota', [PublicController::class, 'frota'])->name('public.frota');
Route::get('/reservar', [PublicController::class, 'reservar'])->name('public.reservar');
Route::post('/reservar', [PublicController::class, 'storeReserva'])->name('public.reservar.store');
Route::get('/contacto', [PublicController::class, 'contacto'])->name('public.contacto');
Route::get('/sobre', [PublicController::class, 'sobre'])->name('public.sobre');

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Admin Bicicletas
Route::get('/admin/bicicletas', [BicicletaController::class, 'index'])->name('admin.bicicletas.index');
Route::get('/admin/bicicletas/create', [BicicletaController::class, 'create'])->name('admin.bicicletas.create');
Route::post('/admin/bicicletas', [BicicletaController::class, 'store'])->name('admin.bicicletas.store');
Route::get('/admin/bicicletas/{id}', [BicicletaController::class, 'show'])->name('admin.bicicletas.show');
Route::get('/admin/bicicletas/{id}/edit', [BicicletaController::class, 'edit'])->name('admin.bicicletas.edit');
Route::put('/admin/bicicletas/{id}', [BicicletaController::class, 'update'])->name('admin.bicicletas.update');
Route::delete('/admin/bicicletas/{id}', [BicicletaController::class, 'destroy'])->name('admin.bicicletas.destroy');

// Admin Categorias
Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');
Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
Route::get('/admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
Route::put('/admin/categorias/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
Route::delete('/admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

// Admin Reservas
Route::get('/admin/reservas', [ReservaController::class, 'index'])->name('admin.reservas.index');
Route::get('/admin/reservas/create', [ReservaController::class, 'create'])->name('admin.reservas.create');
Route::post('/admin/reservas', [ReservaController::class, 'store'])->name('admin.reservas.store');
Route::get('/admin/reservas/{id}', [ReservaController::class, 'show'])->name('admin.reservas.show');
Route::get('/admin/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('admin.reservas.edit');
Route::put('/admin/reservas/{id}', [ReservaController::class, 'update'])->name('admin.reservas.update');
Route::delete('/admin/reservas/{id}', [ReservaController::class, 'destroy'])->name('admin.reservas.destroy');

// Admin Clientes
Route::get('/admin/clientes', [ClienteController::class, 'index'])->name('admin.clientes.index');
Route::get('/admin/clientes/create', [ClienteController::class, 'create'])->name('admin.clientes.create');
Route::post('/admin/clientes', [ClienteController::class, 'store'])->name('admin.clientes.store');
Route::get('/admin/clientes/{id}', [ClienteController::class, 'show'])->name('admin.clientes.show');
Route::get('/admin/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('admin.clientes.edit');
Route::put('/admin/clientes/{id}', [ClienteController::class, 'update'])->name('admin.clientes.update');
Route::delete('/admin/clientes/{id}', [ClienteController::class, 'destroy'])->name('admin.clientes.destroy');

// Admin Pagamentos
Route::get('/admin/pagamentos', [PagamentoController::class, 'index'])->name('admin.pagamentos.index');
Route::get('/admin/pagamentos/create', [PagamentoController::class, 'create'])->name('admin.pagamentos.create');
Route::post('/admin/pagamentos', [PagamentoController::class, 'store'])->name('admin.pagamentos.store');
Route::get('/admin/pagamentos/{id}', [PagamentoController::class, 'show'])->name('admin.pagamentos.show');
Route::put('/admin/pagamentos/{id}/estado', [PagamentoController::class, 'updateEstado'])->name('admin.pagamentos.estado');
Route::delete('/admin/pagamentos/{id}', [PagamentoController::class, 'destroy'])->name('admin.pagamentos.destroy');