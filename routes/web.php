<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Book\BookController;
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
        return view('index');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(BookController::class)->group(function () {
        Route::get('book/index', 'index');
        Route::get('book/register_book', 'register_book');
        Route::post('/book/register_book_action', 'register_book_action')->name('register_book_action');

        Route::get('book/genre', 'genre');
        Route::get('book/register_book_genre', 'register_book_genre');
        Route::post('/book/register_book_genre_action', 'register_book_genre_action')->name('register_book_genre_action');

        Route::get('book/view_book/{id}', 'view_book');
        Route::get('book/edit_book/{id}', 'edit_book');
        Route::post('book/update_book_detail', 'update_book_detail');

        // borrow_this_book
        Route::post('book/borrow_this_book', 'borrow_this_book');
        Route::get('book/book_issued', 'book_issued');
        // return_this_book
        Route::post('book/return_this_book', 'return_this_book');
    })->middleware('auth');
