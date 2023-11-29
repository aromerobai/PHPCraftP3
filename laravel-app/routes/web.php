    <?php

use App\Http\Controllers\homeController;
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
Route::get('/mostrarFormularioLogin', [homeController::class, 'mostrarFormularioLogin'])->name('login');