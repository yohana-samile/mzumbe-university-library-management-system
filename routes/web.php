<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Book\BookController;
    use App\Http\Controllers\Service\ServiceController;
    use App\Http\Controllers\Event\Event_And_AnnouncementController;
    use App\Http\Controllers\WorkingTime\WorkingTimeController;
    use App\Http\Controllers\Unit\StudentUnitController;
    use App\Http\Controllers\User\UserController;
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

        // borrow
        Route::post('book/borrow_this_book', 'borrow_this_book');
        Route::get('book/book_issued', 'book_issued');
        Route::get('book/borrow_info/{id}', 'borrow_info');
        // return_this_book
        Route::post('book/return_this_book', 'return_this_book');
        // fine
        Route::get('view_fine', 'view_fine');
        Route::post('book/view_fine_action', 'view_fine_action'); //add fine
        Route::post('pay_my_fine', 'pay_my_fine');
    })->middleware('auth');


    Route::controller(ServiceController::class)->group(function () {
        Route::get('services/index', 'index');
        Route::get('services/add_service', 'add_service');
        Route::post('/services/add_service_action', 'add_service_action')->name('add_service_action');
        Route::post('/services/delete_service', 'delete_service')->name('delete_service');
    })->middleware('auth');


    Route::controller(Event_And_AnnouncementController::class)->group(function () {
        Route::get('events/index', 'index');
        Route::get('events/add_event', 'add_event');
        Route::post('/events/add_event_action', 'add_event_action')->name('add_event_action');
        Route::post('/events/delete_event', 'delete_event');
    })->middleware('auth');


    Route::controller(WorkingTimeController::class)->group(function () {
        Route::get('workingTime/index', 'index');
        Route::get('workingTime/add_workingTime', 'add_workingTime');
        Route::post('/workingTime/add_workingTime_action', 'add_workingTime_action')->name('add_workingTime_action');
    })->middleware('auth');


    Route::controller(StudentUnitController::class)->group(function () {
        Route::get('units/studentUnit', 'studentUnit');
        Route::get('units/addUnit', 'addUnit');
        Route::post('/units/register_unit', 'register_unit')->name('register_unit');

        // create_programme
        Route::get('units/programme', 'programme');
        Route::get('units/addProgramme', 'addProgramme');
        Route::post('/units/register_Programme', 'register_Programme')->name('register_Programme');
    })->middleware('auth');


    // students & staff
    Route::controller(UserController::class)->group(function () {
        Route::get('users/student', 'student');
        Route::get('users/register_student', 'register_student');
        Route::post('/users/register_student_action', 'register_student_action')->name('register_student_action');

        // staff
        Route::get('users/staff', 'staff');
        Route::get('users/register_staff', 'register_staff');
        Route::post('/users/register_librarian_action', 'register_librarian_action')->name('register_librarian_action');
    })->middleware('auth');
