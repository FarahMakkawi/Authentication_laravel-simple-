<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
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
}); //->middleware('auth') // middleware([  ,   ])

Route::get('user',[UserController::class,'index'])->middleware(['auth','user:super_user']);
 
Route::get('index2',[UserController::class,'index2'])->name('index2');


// Auth::check('password','passwordEncod');
// mideleware('auth)  اذا ما مسجل دخول برجعني عصفحة ال login
//php artisan route:list;


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('create',[ProductController::class,'create']);


Route::get('create',[ProductController::class,'create']);

Route::get('show/{id}',[ProductController::class,'show']);




Route::middleware('lang')->get('/translate',function(){

if (App::isLocale(Config::get('lang.available_lang.English'))) {
    session()->put('locale','ar');
    app()->setLocale(Config::get('lang.available_lang.Arabic'));
}
else{
    session()->put('locale', 'en');
    app()->setLocale(Config::get('lang.available_lang.English'));
}
return view('translate');

})->name('translate1');

Route::middleware('lang')->get('/translate2',function(){
   
     return view('translate2');
    })->name('translate2');


    // بالكاش لما اعمل كريت او ابديت او ديليت بفي الكااش 
    // اول مرة بسترجع من الداتا بيز ووبعدا بخزنو بالكاش وبصير برجع منو 
    // بيتخزنو ك كي وفاليو 
    // عنا فايل وعنا مصفوفة 