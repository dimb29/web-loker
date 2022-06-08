<?php


use App\Http\Livewire\Main;
use App\Http\Livewire\Search;
use App\Http\Livewire\ProvilNav;
use App\Http\Livewire\NavigationDropdown;
use App\Http\Livewire\Categories\Categories;
use App\Http\Livewire\Categories\Categoryposts;
use App\Http\Livewire\Profile\SimpanLoker;
use App\Http\Livewire\Posts\Berita;
use App\Http\Livewire\Posts\Posts;
use App\Http\Livewire\Posts\Post as p;
use App\Http\Livewire\Tags\Tagposts;
use App\Http\Livewire\Tags\Tags;
use App\Http\Livewire\Filter\CommponentFilter as Filter;
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

// Route::get('test', function () {
//     $category = App\Models\Category::find(3);
//     // return $category->posts;

//     $comment = App\Models\Comment::find(152);
//     // return $comment->author;
//     // return $comment->post;

//     $post = App\Models\Post::find(152);
//     // return $post->category;
//     // return $post->author;
//     // return $post->images;
//     // return $post->comments;
//     // return $post->tags;

//     $tag = App\Models\Tag::find(5);
//     // return $tag->posts;

//     $author = App\Models\User::find(88);
//     // return $author->posts;
//     return $author->comments;
// });


Route::get('/', Main::class)->name('dashboard');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Main::class)->name('dashboard');
Route::get('/dashboard', Main::class)->name('dashboard');

Route::get('dashboard/categories', Categories::class)->name('categories');
Route::get('dashboard/categories/{id}/posts', Categoryposts::class);

Route::get('dashboard/posts', Posts::class)->name('posts');
Route::get('dashboard/posts/{id}', p::class);

Route::get('dashboard/filter', Filter::class)->name('tags');
// Route::get('dashboard/berita/{id}', Berita::class)->name('berita');
Route::get('dashboard/berita/{id}', Berita::class);
Route::get('dashboard/search', Search::class)->name('search');
// Route::get('dashboard/navprov', ProvilNav::class)->name('navprov');

Route::prefix('user')->group(function(){
    Route::get('/saveloker', SimpanLoker::class)->name('saveloker');
});
