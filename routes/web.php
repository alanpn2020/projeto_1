<?php

use App\Http\Controllers\Banners\BannersController;
use App\Http\Controllers\Empreendimentos\EmpreendimentosController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

/// ROTAS BANNERS
Route::get('/admin/banners', [BannersController::class, 'index'])->middleware(['auth', 'verified'])->name('banners');
Route::get('/admin/banners/datatable_banners', [BannersController::class, 'datatable_banners'])->middleware(['auth', 'verified']);
Route::delete('/admin/banners/excluir', [BannersController::class, 'excluir'])->middleware(['auth', 'verified']);
Route::post('/admin/banners/edit_banners', [BannersController::class, 'editar'])->middleware(['auth', 'verified']);
Route::post('/admin/banners/add_banners', [BannersController::class, 'adicionar'])->middleware(['auth', 'verified']);

/// ROTAS EMPREENDIMENTOS
Route::get('/admin/empreendimentos', [EmpreendimentosController::class, 'index'])->middleware(['auth', 'verified'])->name('empreendimento');
Route::get('/admin/empreendimentos/datatable_empreendimentos', [EmpreendimentosController::class, 'datatable_empreendimentos'])->middleware(['auth', 'verified']);
Route::delete('/admin/empreendimentos/excluir', [EmpreendimentosController::class, 'excluir'])->middleware(['auth', 'verified']);
Route::post('/admin/empreendimentos/edit_empreendimentos', [EmpreendimentosController::class, 'editar'])->middleware(['auth', 'verified']);
Route::post('/admin/empreendimentos/add_empreendimentos', [EmpreendimentosController::class, 'adicionar'])->middleware(['auth', 'verified']);

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
