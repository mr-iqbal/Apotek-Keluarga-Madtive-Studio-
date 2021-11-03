<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
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



Route::get('/login','LoginController@index')->middleware('guest')->name('login');
Route::post('/login','LoginController@authenticate');

Route::get('/register','RegisterController@index')->middleware('guest');
Route::post('/register','RegisterController@store')->name('register');

Route::get('/dashboard/posts/checkSlug','PostController@checkSlug')->middleware('auth');
Route::get('/dashboard/categories/checkSlug','CategoryController@checkSlug')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/posts','PostController');
    Route::resource('/dashboard/categories','CategoryController');
    Route::resource('/dashboard/heroes','HeroController');
    Route::resource('/dashboard/galleries','GalleryController');
    Route::get('/logout','LoginController@logout');
    Route::get('/dashboard','DashboardController@index');
    Route::get('/dashboard/profile','ProfileController@index');
});

//Frontend
Route::get('/', function () {
    return view('frontend.index',[
        'page'      => 'Homepage',       
        'title'     => 'Apotek Keluarga'
    ]);
});



//menampilkan seluruh posts 
Route::get('/article','ArticleController@index');

//menampilkan single post / detail post
Route::get('/article/{post:slug}', 'ArticleController@index');
Route::get('/article/{post:slug}', 'ArticleController@show');

//menampilkan halaman tentang kami  
Route::get('/about-us', function () {
   return view('frontend.about_us',[
       'page'   => 'Tentang Kami',
       'title'  => 'Apotek Keluarga',
   ]); 
});

//menampilkan semua category (admin) 
// Route::get('dashboard/categories', function () {
//     return view('dashboard.category.index',[
//         'page'          => 'Semua Kategori',
//         'title'         => 'Apotek Keluarga',
//         'categories'    => Category::all()
//     ]);
// });


Route::get('/categories/{category:slug}', function (Category $category) {
    return view('frontend.category',[
        'page'      => $category->name,
        'title'     => 'Apotek Keluarga',
        'posts'     => $category->posts,
        'category'  => $category->name
    ]);
});


// Route::get('/authors/{user}', function (User $user) {
//     return view('');
// });