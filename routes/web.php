<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\KanbanCircuit;
use App\Livewire\Admin\KanbanMaterialFa;
use App\Livewire\Admin\KanbanMaterialPa;
use App\Livewire\Home\Home;
use App\Models\KanbanMaterialFa as ModelsKanbanMaterialFa;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


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

Route::get('/', Home::class);

Route::get('/kanban-circuit', KanbanCircuit::class);
Route::get('/kanban-material-fa', KanbanMaterialFa::class);
Route::get('/kanban-material-pa', KanbanMaterialPa::class);

Route::get('/tes', function(){
    $kanban = ModelsKanbanMaterialFa::all();
    dd($kanban);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//prefix for asset
// Route::group(['prefix' => '/graphic/public/'], function(){
//     Livewire::setUpdateRoute(function ($handle){
//         return Route::post('/livewire/update', $handle);
//     });
// });

require __DIR__.'/auth.php';
