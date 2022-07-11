<?php





use App\Http\Livewire\Main;

use App\Http\Controllers\Auth\Employer\AuthenticatedEmployerController;

use App\Http\Controllers\Auth\Employer\RegisteredEmployerController;

use App\Http\Controllers\Employer\ProfilEmployer;

use App\Http\Livewire\Search;

use App\Http\Livewire\SearchSingle;

use App\Http\Livewire\SearchIndex;

use App\Http\Livewire\ProvilNav;

use App\Http\Livewire\NavBot;

use App\Http\Livewire\Profil\Account;

use App\Http\Livewire\NavigationDropdown;

use App\Http\Livewire\Categories\Categories;

use App\Http\Livewire\Categories\Categoryposts;

use App\Http\Livewire\Profile\SimpanLoker;

use App\Http\Livewire\Posts\Berita;

use App\Http\Livewire\Posts\Posts;

use App\Http\Livewire\Posts\Post as p;

use App\Http\Livewire\Tags\Tagposts;

use App\Http\Livewire\Tags\Tags;

use App\Http\Livewire\Payment\Payments;

use App\Http\Livewire\Payment\Method;

use App\Http\Livewire\Payment\PayOn;

use App\Http\Livewire\Pdf\Mpdf;

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





Route::get('/', Main::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Main::class)->name('dashboard');



Route::prefix('dashboard')->group(function(){

    Route::get('/', Main::class)->name('dashboard');

    

    Route::get('/categories', Categories::class)->name('categories');

    Route::get('/categories/{id}/posts', Categoryposts::class);

    

    Route::get('/posts', Posts::class)->name('posts');

    Route::get('/posts/{id}', p::class);

    

    Route::get('/filter', Filter::class)->name('tags');

    // Route::get('/berita/{id}', Berita::class)->name('berita');

    Route::get('/berita', Berita::class)->name('berita');
    Route::get('/berita/{id}', Berita::class)->name('berita/{id}');

    Route::get('/search', Search::class)->name('search');

    Route::get('/range', SearchSingle::class);

    // Route::get('/navprov', ProvilNav::class)->name('navprov');

    Route::get('/navbot',Navbot::class)->name('navbot');
    Route::get('/account',Account::class)->name('account');
    
    Route::get('/autocomplete-search', [Main::class, 'autocompleteSearch']);
    Route::get('/autocomplete2-search', [SearchIndex::class, 'autocompleteSearch']);



    Route::prefix('payment')->group(function(){

        Route::get('/',Payments::class)->name('payment');

        Route::get('/payon', PayOn::class);

        Route::get('/detail/{id}', [Mpdf::class, 'detailPayPdf']);

        Route::get('/{id}', Method::class);

    });

});



Route::prefix('user')->group(function(){

    Route::get('/saveloker', SimpanLoker::class)->name('saveloker');

});

Route::prefix('employer')->group(function(){
    Route::get('/profil', [ProfilEmployer::class, 'render'])->name('employer-profil');
    Route::post('/register', [RegisteredEmployerController::class, 'store']);
    Route::get('/register', [RegisteredEmployerController::class, 'create'])->name('registers');
    Route::get('/login', [AuthenticatedEmployerController::class, 'create'])->name('logins');
    Route::post('/login', [AuthenticatedEmployerController::class, 'store']);

});

Route::get('/cleareverything', function () {

    $clearcache = Artisan::call('cache:clear');

    echo "Cache cleared<br>";



    $clearview = Artisan::call('view:clear');

    echo "View cleared<br>";



    $clearconfig = Artisan::call('config:cache');

    echo "Config cleared<br>";



    $clearconfig = Artisan::call('route:clear');

    echo "route cleared<br>";
    
    
    
    $clearconfig = Artisan::call('optimize');

    echo "optimize<br>";

});
// Route::get('/symlink', function () {
//    $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
//    $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
//    symlink($target, $link);
//    echo "Done";
// });