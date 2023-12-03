<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\userInscriptionController;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\userDesInscriptionController;
use App\Http\Controllers\adminAddEventController;
use App\Http\Controllers\adminConfigEventController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminEditEventController;
use App\Http\Controllers\adminPonenteController;
use App\Http\Controllers\adminTypeEventController;
use App\Http\Controllers\adminConfigInscritos;
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

Route::get('/userBack', [userController::class,'userBack'])->name("userBack");
Route::post('/userProfile', [userController::class,'userProfile'])->name("userProfile");
Route::post('/userInscription', [userController::class,'userInscription'])->name("userInscription");
Route::post('/userDesInscription', [userController::class,'userDesInscription'])->name("userDesInscription");
Route::get('/usuarioVista', [userController::class,'usuarioVista'])->name("usuarioVista");

Route::post('/userProfileModify', [userProfileController::class,'userProfileModify'])->name("userProfileModify");
Route::get('/userProfileBack', [userProfileController::class,'userProfileBack'])->name("userProfileBack");
Route::post('/userAddInscription', [userInscriptionController::class,'userAddInscription'])->name("userAddInscription");
Route::post('/userAddInscriptionBack', [userInscriptionController::class,'userAddInscriptionBack'])->name("userAddInscriptionBack");
Route::post('/userDesAddInscription', [userDesInscriptionController::class,'userDesAddInscription'])->name("userDesAddInscription");

Route::get('/adminBack', [adminController::class,'adminBack'])->name("adminBack");
Route::get('/adminAddEvent', [adminAddEventController::class,'adminAddEvent'])->name("adminAddEvent");
Route::post('/adminAddEventInsert', [adminAddEventController::class,'adminAddEventInsert'])->name("adminAddEventInsert");
Route::get('/adminConfigEvent', [adminConfigEventController::class,'adminConfigEvent'])->name("adminConfigEvent");
Route::get('/editEvent', [adminEditEventController::class,'editEvent'])->name("editEvent");
Route::post('/adminEditFullEvent', [adminEditEventController::class,'adminEditFullEvent'])->name("adminEditFullEvent");
Route::get('/adminPonente', [adminPonenteController::class,'adminPonente'])->name("adminPonente");
Route::post('/adminCrearPonente', [adminPonenteController::class,'adminCrearPonente'])->name("adminCrearPonente");
Route::post('/adminGestionarPonente', [adminPonenteController::class,'adminGestionarPonente'])->name("adminGestionarPonente");
Route::get('/adminTypeEvent', [adminTypeEventController::class,'adminTypeEvent'])->name("adminTypeEvent");
Route::post('/adminTypeEventEdit', [adminTypeEventController::class,'adminTypeEventEdit'])->name("adminTypeEventEdit");
Route::post('/adminTypeEventAdd', [adminTypeEventController::class,'adminTypeEventAdd'])->name("adminTypeEventAdd");
Route::get('/configInscritos', [adminConfigInscritos::class,'configInscritos'])->name("configInscritos");
Route::get('/configInscritosGest', [adminConfigInscritos::class,'configInscritosGest'])->name("configInscritosGest");
Route::get('/configInscribir', [adminConfigInscritos::class,'configInscribir'])->name("configInscribir");
Route::get('/configDesInscribir', [adminConfigInscritos::class,'configDesInscribir'])->name("configDesInscribir");
Route::get('/adminDesincribir', [adminConfigInscritos::class,'adminDesincribir'])->name("adminDesincribir");
Route::get('/adminIncribir', [adminConfigInscritos::class,'adminIncribir'])->name("adminIncribir");
