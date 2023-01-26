<?php

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

//admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    
    //magazine routes
    Route::controller(App\Http\Controllers\Mag\MagazineController::class)->group(function () {
        Route::get('/mag/modification', 'index')->name('mag.mod');
        Route::post('/mag/modification', 'store')->name('mag.store');
        Route::delete('/mag/modification/{magazine}', 'destroy')->name('mag.delete');    
    });
        
    //draft routes
    Route::controller(App\Http\Controllers\Draft\DraftController::class)->group(function () {
        Route::get('/draft', 'index')->name('draft.index');
        Route::get('/draft/{draft:uid}/edit', 'edit')->name('draft.edit');
        Route::post('/draft', 'store')->name('draft.store');
        Route::post('/draft/{draft:uid}/edit', 'update')->name('draft.update');
        Route::delete('/draft/{draft}', 'destroy')->name('draft.delete');
    });

    //manga controllers
    Route::controller(App\Http\Controllers\Manga\MangaController::class)->group(function () {
        Route::get('/manga/index', 'index')->name('manga.index');
    });
    Route::controller(App\Http\Controllers\Manga\StudioController::class)->group(function () {
        Route::get('/manga/studio', 'index')->name('manga.studio');
    });

    //favourite routes
    Route::get('/favourite/liked', [App\Http\Controllers\Favourite\LikedController::class, 'index'])->name('fav.liked');
    Route::get('/favourite/bookmarked', [App\Http\Controllers\Favourite\BookmarkController::class, 'index'])->name('fav.marked');

    //quote routes
    Route::get('/favourite/quote', [App\Http\Controllers\Draft\QuoteController::class, 'index'])->name('quote.index');
    Route::post('/draft/{draft}', [App\Http\Controllers\Draft\QuoteController::class, 'store'])->name('quote.store');

    //notification route
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        /*  Name: Notifications 
        *   url:  /dashboard/notifications*
        *   route:  dashboard.notifications*
        */
        Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function() {
            Route::get('/', [App\Http\Controllers\Dashboard\NotificationController::class, 'index'])->name('index');
        });
    });

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/mag/subscriptions', [App\Http\Controllers\Mag\SubscriptionController::class, 'index'])->name('subscriptions');

});


//this route is temporor untill the logic is being setup
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/draft/{draft:uid}', [App\Http\Controllers\Draft\DraftController::class, 'show'])->name('draft.show');
Route::get('/mag/{magazine:slug}/index', [App\Http\Controllers\Mag\MagazineController::class, 'show'])->name('mag.show');

