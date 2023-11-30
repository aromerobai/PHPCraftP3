    <?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\registerController;
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

Route::get('/', [homeController::class, 'init']);
Route::get('/mostrarFormularioRegistro', [homeController::class, 'mostrarFormularioRegistro'])->name('register');
Route::get('/mostrarFormularioLogin', [loginController::class, 'init'])->name('login');

Route::post('/mostrarFormularioLogin',[loginController::class, 'userLogin'])->name("userLogin");
Route::post('/mostrarFormularioRegistro',[registerController::class, 'register'])->name("register");
Route::post('/userProfile', [userController::class,'userProfile'])->name("userProfile");
Route::get('/crearActo', [AdminController::class, 'crearActo'])->name('crearActo');
Route::get('/confActo', [AdminController::class, 'confActo'])->name('confActo');