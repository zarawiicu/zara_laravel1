<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;

use Illuminate\Support\Facades\Route;

//Basic Routing
Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
    return 'World';
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

// Route Parameters
Route::get('/user/{name}', function($name){
    return 'Nama saya ' . $name;
});

Route::get('/article/{id}', [ArticleController::class, 'index']);
// Multi parameters
Route::get('/posts/{post}/comments/{comment}', function ($postsId, $commentId){
    return 'Pos ke : ' . $postsId . ' Komentar ke : ' . $commentId;
});

// Optional Parameters
Route::get('/user/{name?}', function($name = 'Alwi'){
    return 'Nama saya ' . $name;
});

//Resouce Controller
Route::resource('photos', PhotoController::class);

//Membatasi Route Resource
//ONLY
Route::resource('photos', PhotoController::class)->only(['index', 'show']);

//EXCEPT
Route::resource('photos', PhotoController::class)->except(['create', 'store']);

//Views
Route::get('/greeting', function(){
    return view('blog.hello', ['name' => 'Zara']);
})
// Route Name
//Route::get('/user/profile', function(){
    //mengisi route dengan callback
//})->name('profile');

// route dengan controller
//Route::get('/user/profile', [UserProfilController::class, 'show'])->name('profile');
// Cara memanggil
//Generate url route profile dengan fungsi route()
//$url = route('profile');

// redirect ke route profile
//return redirect()->route('profile');

// Route Group
// Route::middleware(['auth','admin'])->group(function (){
//     Route::get('master/book', function(){
//         //Route menggunakn middleware auth dan admin
//     });

//     Route::get('/user/profile', function (){
//         // Rute menggunakan middleware auth dan admin
//     });
// });

//Route::middleware('auth')->group(function (){
    // Route hanya menggunakan middleware auth
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// Route Prefixes
// Route::prefix('admin')->group(function(){
//     Route::get('/user', [UserController::class, 'index']);
    //Hasil URL: localhost/zara_laravel1/public/admin/user

    //Route::get('/post', [PostController::class, 'index']);
    //Hasil URL: localhost/zara_laravel1/public/admin/user

    //Route::get('/event', [EventController::class, 'index']);
    //Hasil URL: localhost/zara_laravel1/public/admin/user
//});

// Redirect Route
//Route::redirect('/here','/there');

// Views Route
//Route::view('/welcome', 'welcome');
//Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
;