<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\Home\Blog\HomeBlogController;
use App\Http\Controllers\Home\Blog\HomeCategoryController;
use App\Http\Controllers\Home\Blog\HomeTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Choice;
use App\Models\Participant;
use App\Models\Question;
use Illuminate\Support\Facades\App;

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!get
|
*/
$ip = \Request::ip();//Dynamic IP address get
//$ip = '175.45.142.131'; //For static IP address get (JAPAN)
//$ip = '103.100.137.255'; //For static IP address get (PHILIPPINES)
//$ip = '85.214.132.117'; //For static IP address get (Germany)
$data = \Location::get($ip);
$locale = strtolower($data->countryCode);
if( $locale == 'jp') {
    App::setLocale($locale);
    Carbon::setlocale('ja');
} else {
    App::setLocale('en');
}

/* LOGINS */
Route::controller(LoginController::class)->group(function(){
    Route::get('admin/login', 'index')->name('login');
    Route::post('admin/login/process', 'process');
    Route::post('admin/logout', 'logout');
});

/* DASHBOARD */
Route::controller(DashboardController::class)->group(function(){
    Route::get('admin/dashboard', 'index')->middleware('auth');
    Route::get('admin/dashboard/show/{id}', 'show')->name('admin.dashboard.show');
});

/* PLATFORMS */
Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function(){
    Route::controller(PlatformController::class)->group(function(){
        Route::get('/admin/airdrop/platform', 'index')->middleware('auth');
        Route::post('admin/airdrop/platform/store', 'store')->middleware('auth');
        Route::get('admin/airdrop/platform/{id}/update', 'update')->middleware('auth');
    });
});

/* BLOGS */
Route::controller(BlogController::class)->group(function () {
    Route::get('admin/blog', 'index')->middleware('auth')->name('admin.blog');
    Route::get('admin/blog/create', 'create')->middleware('auth')->name('admin.blog.create');
    Route::post('admin/blog/store', 'store')->middleware('auth')->name('admin.blog.store');
    Route::delete('admin/blog/delete', 'destroy')->middleware('auth')->name('admin.blog.destroy');
    Route::get('admin/blog/edit/{id}', 'edit')->middleware('auth')->name('admin.blog.edit');
    Route::get('admin/blog/edit/detach_tag/{id}', 'detach_tag')->middleware('auth')->name('admin.blog.edit.detach_tag');
    Route::put('admin/blog/update/{id}', 'update')->middleware('auth')->name('admin.blog.update');
    Route::get('admin/blog/search/', 'search')->name('blog.search');
});

/* HOME NEWS */
Route::namespace('App\Http\Controllers\Home\Blog')->controller(HomeBlogController::class)->group(function () {
    Route::get('/news', 'index');
    Route::get('news/{slug}', 'show');
    Route::get('news/category/{slug}', 'showCat');
    Route::get('news/tag/{slug}', 'showTag');
});
/* HOME BLOGS CATEGORY
Route::namespace('App\Http\Controllers\Home\Blog')->controller(HomeCategoryController::class)->group(function () {
    Route::get('blog/category/{slug}', 'index')->name('blog.category');
}); */
/*  HOME BLOG TAGS 
Route::namespace('App\Http\Controllers\Home\Blog')->controller(HomeTagController::class)->group(function () {
    Route::get('blog/tag/{slug}', 'index')->name('blog.tag');
});*/

Route::controller(SubscriptionController::class)->group(function(){
    Route::get('/subscriptions/japan', 'showJapan')->middleware('auth')->name('subscriptions.japan');
});

//Route::get('subscription/japan', 'showJapan', function() {
   //return view('admin.subscription.japan')->middleware('auth')->name('subscriptions.japan');
//});



/* CATEGORIES */
Route::controller(CategoryController::class)->group(function () {
    Route::get('admin/category', 'index')->middleware('auth')->name('admin.category');
    Route::get('admin/category/create', 'create')->middleware('auth')->name('admin.category.create');
    Route::post('admin/category/store', 'store')->middleware('auth')->name('admin.category.store');
    Route::get('admin/category/edit/{id}', 'edit')->middleware('auth')->name('admin.category.edit');
    Route::put('admin/category/update/{id}', 'update')->middleware('auth')->name('admin.category.update');
});

/*TAGS*/
Route::controller(TagController::class)->group(function () {
    Route::get('admin/tag', 'index')->middleware('auth')->name('admin.tag');
    Route::get('admin/tag/create', 'create')->middleware('auth')->name('admin.tag.create');
    Route::post('admin/tag/store', 'store')->middleware('auth')->name('admin.tag.store');
    Route::get('admin/tag/edit/{id}', 'edit')->middleware('auth')->name('admin.tag.edit');
    Route::put('admin/tag/update/{id}', 'update')->middleware('auth')->name('admin.tag.update');
});

/*PROMOS*/
Route::controller(PromoController::class)->group(function(){
    Route::get('admin/airdrop/promo', 'index')->middleware('auth');
    Route::get('admin/airdrop/promo/create', 'create')->middleware('auth');
    Route::get('admin/airdrop/promo/edit/{id}', 'edit')->middleware('auth');
    Route::delete('admin/airdrop/promo/delete', 'destroy')->middleware('auth');
    Route::put('admin/airdrop/promo/update/{id}', 'update')->middleware('auth');
    Route::post('admin/airdrop/promo/store', 'store')->middleware('auth');
    Route::get('admin/airdrop/promo/view/{id}', 'view')->middleware('auth');
    Route::put('admin/airdrop/promo/view/{url_id}/generate_url', 'generate_url')->middleware('auth');
});

/*QUESTIONS*/    
Route::controller(QuestionController::class)->group(function(){
    Route::get('admin/airdrop/promo/manage_question/{id}', 'index')->middleware('auth');
    Route::post('admin/airdrop/promo/manage_question/store', 'store')->middleware('auth');
    Route::get('admin/airdrop/promo/manage_question/{id}/edit', 'edit')->middleware('auth');
    Route::put('admin/airdrop/promo/manage_question/{id}/update', 'update')->middleware('auth');
    Route::delete('admin/airdrop/promo/manage_question/delete', 'destroy')->middleware('auth');
});


/*PROMO CODES*/
Route::controller(CodeController::class)->group(function(){
    Route::post('admin/airdrop/promo/promocode/store', 'store')->middleware('auth');
    Route::post('admin/airdrop/promo/promocode/update', 'update')->middleware('auth');
});

/*USERS*/
Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('admin/users/', 'index')->middleware('auth');
        Route::post('admin/users/store', 'store')->middleware('auth');
        Route::get('admin/users/edit/{id}', 'edit')->middleware('auth');
        Route::put('admin/users/update/{id}', 'update')->middleware('auth');
        Route::post('admin/users/store_new_platform', 'store_new_platform')->middleware('auth');
        Route::post('admin/users/remove_platform', 'remove_platform')->middleware('auth');
    });
});

/*LANGUAGE*/
Route::group(['admin' => 'post', 'middleware' => ['auth'],'as' => 'admin.'], function(){
    Route::resource('languages', LanguageController::class);
    Route::resource('ads', AdvertisementController::class);
    Route::resource('subscriptions', SubscriptionController::class);
});

/*PARTICIPANTS*/
Route::controller(ParticipantController::class)->group(function (){
    Route::post('admin/airdrop/promo/participant/store', 'store')->middleware('auth');
    Route::get('admin/airdrop/promo/participant/view/{id}', 'view')->middleware('auth');
    Route::put('admin/airdrop/promo/participant/update/{id}', 'update')->middleware('auth');
    Route::post('admin/airdrop/promo/participant/winner', 'winner')->middleware('auth');
    Route::delete('admin/airdrop/promo/participant/destroy/{id}', 'destroy')->middleware('auth');
    Route::get('admin/airdrop/promo/participant/export/{url_id}', 'exportParticipantData')->middleware('auth');
});

//K8 LINKS ADMIN
Route::controller(LinkController::class)->group(function (){
    Route::get('/links', 'view')->name('links');
    Route::get('admin/links', 'index')->middleware('auth');
    Route::get('admin/links/create', 'create')->middleware('auth');
    Route::post('admin/links/store', 'store')->middleware('auth')->name('admin.links.store');
    Route::get('admin/links/edit/{id}', 'edit')->middleware('auth');
    Route::put('admin/links/update/{id}', 'update')->middleware('auth');
});

//BANNER
Route::controller(BannerController::class)->group(function () {
    Route::get('admin/banners', 'index')->middleware('auth')->name('admin.banners.index');
    Route::get('admin/banners/create', 'create')->middleware('auth')->name('admin.banners.create');
    Route::post('admin/banners/store', 'store')->middleware('auth')->name('admin.banners.store');
    Route::delete('admin/banners/delete', 'destroy')->middleware('auth')->name('admin.banners.destroy');
    Route::get('admin/banners/edit/{id}', 'edit')->middleware('auth')->name('admin.banners.edit');
    Route::put('admin/banners/update/{id}', 'update')->middleware('auth');
});

//carousels
Route::controller(CarouselController::class)->group(function () {
    Route::get('admin/carousels', 'index')->middleware('auth')->name('admin.carousels.index');
    Route::get('admin/carousels/create', 'create')->middleware('auth')->name('admin.carousels.create');
    Route::post('admin/carousels/store', 'store')->middleware('auth')->name('admin.carousels.store');
    Route::delete('admin/carousels/delete', 'destroy')->middleware('auth')->name('admin.carousels.destroy');
    Route::get('admin/carousels/edit/{id}', 'edit')->middleware('auth')->name('admin.carousels.edit');
    Route::put('admin/carousels/update/{id}', 'update')->middleware('auth');
});


Route::controller(ArchiveController::class)->group(function (){
    Route::get('admin/airdrop/promo/archive' , 'index')->middleware('auth');
});

//HOME CONTROLLER
Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index');
    Route::post('promo/{slug}/{url_id}/store_register', 'store_register');
    Route::get('promo/{slug}/{url_id}', 'show');
    Route::post('promo/{slug}/{url_id}/subscribe_newsletter', 'subscribe_newsletter');
    Route::get('/subscribe-newsletter', 'subscribeIndex');
    Route::get('/subscribe-newsletter/store', 'subscribeStore');
    Route::get('promo/{slug}/{url_id}/promo_ended', 'promo_ended');
    Route::get('participant_registered', 'participant_registered');
    Route::get('active', 'activePromo');
    Route::get('ended', 'endedPromo');
});

//RESULTS CONTROLLER
Route::controller(ResultController::class)->group(function () {
    Route::get('/promo/results', 'index');
    Route::get('/promo/result/{slug}/{url_id}', 'show');
});

Route::get('promo/18k-mega-giveaway', function(){
   return view('18k-giveaway'); 
});

//REDIRECT SNS LINKS ENGLISH
Route::get('/fben', function() {
    return redirect('https://www.facebook.com/k8.io.official'); // facebook
 })->name('enFacebook');

 Route::get('/twxen', function() {
    return redirect('https://twitter.com/k8official_en'); // twitter
 })->name('enTwitter');

 Route::get('/instaen', function() {
    return redirect('https://www.instagram.com/_k8gaming/'); // instagram
 })->name('enInstagram');

 Route::get('/yten', function() {
    return redirect('https://www.youtube.com/@K8-ZONE'); // youtube
 })->name('enYoutube');

 Route::get('/teleen', function() {
    return redirect('https://t.me/k8casino'); // telegram
 })->name('enTelegram');

 Route::get('/discord', function() {
    return redirect('https://discord.gg/m7aV5kRF4w'); //discord
 })->name('enDiscord');

 Route::get('/tiktoken', function() {
    return redirect('https://prelink.co/k8tiktokeng'); // tiktok
 })->name('enTiktok');

 Route::get('/twitchen', function() {
    return redirect('https://www.twitch.tv/k8casino'); // twitch
 })->name('enTwitch');

 Route::get('/forum', function() {
    return redirect('https://www.k8forum.io/'); // forum
 })->name('k8forum');
 
 
 // REDIRECT SNS LINK JAPAN
  Route::get('/ytjp', function() {
    return redirect('https://www.youtube.com/@K8-ZONE'); // youtube
 })->name('jpYoutube');
 
Route::get('/tgcn', function() {
    return redirect('https://t.me/K8news'); // telegram
 })->name('jpTelegram');

 Route::get('/instajp', function() {
    return redirect('https://www.instagram.com/k8.io_japan/'); // instagram
 })->name('jpInstagram');

 Route::get('/twxjp', function() {
    return redirect('https://www.twitter.com/k8official_jp'); // twitter
 })->name('jpTwitter');

 Route::get('/twitchjp', function() {
    return redirect('https://www.twitch.tv/k8_official_jp'); // twitch
 })->name('jpTwitch');

 Route::get('/linejp', function() {
    return redirect('https://liff.line.me/1645278921-kWRPP32q/?accountId=510ftlxl'); // line
 })->name('jpLine');


 Route::get('/share', function() {
    return view('share');
 });


 Route::get('/playroom', function () {
    $choicess = Choice::all();
    $question = Question::with('choices')->where('promo_url_id', 'Ikgry6');
    $participantsData = Participant::with('choices')->where('promo_url_id', 'Ikgry6')->get();
    return view('playroom', [
        'choices' => $choicess,
        'participants' => $participantsData,
        'questions' => $question->get()
    ]);

    return view('playroom');
 });
