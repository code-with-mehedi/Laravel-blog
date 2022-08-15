<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {

    return view('home',
        [
            'posts' => Posts::all()
        ]
    );
});

Route::get('posts/{post}',function($slug){

    // Find post by slug and load by Files class.

    return view('post',[

        'post' => Posts::find($slug)

    ]);

    // Load posts using php get contents method.

    // $path= __DIR__."/../resources/posts/{$slug}.html";

    // if(!file_exists($path)){
    //     return redirect('/');
    //     // abort(404);
    // }

    // $post= cache()->remember("posts.{$slug}",now()->addMinutes(5),fn()=> file_get_contents($path));

    // $post= file_get_contents($path);
})->where([
    'post' => '[a-zA-z\-]+',
]);

