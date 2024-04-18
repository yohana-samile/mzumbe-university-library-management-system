<?php
    namespace App\Http\Controllers\Book;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Book;
    use App\Models\Genre;
    use App\Models\Borrow;
    use App\Models\Fine;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonResponse;
    use DB;
    use Auth;
    use Illuminate\Support\Facades\Storage;


    class BookController extends Controller {
        // books
        public function index(){
            $books = DB::select('SELECT genres.name, books.id, books.book_title, books.edication, books.isbn, books.publication_date, books.total_copies FROM genres, books WHERE books.genre_id = genres.id ');
            // $books = Book::with('genres')->get();
            return view('book/index', [
                'books' => $books,
            ]);
        }
        public function register_book(){
            $genres = Genre::get();
            return view('book/register_book', compact('genres'));
        }

        public function register_book_action(Request $request){
            $validateData = $request->validate([
                'book_title' => 'required',
                'author' => 'required',
                'isbn' => 'required',
                'publisher' => 'required',
                'publication_date' => 'required',
                'edication' => 'required',
                'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'total_copies' => 'required',
                'genre_id' => 'required'
            ]);
            $coverImagePath = $request->file('cover_image')->store('public/book-covers');
            $register_book = Book::create([
                'book_title' => $validateData['book_title'],
                'author' => $validateData['author'],
                'isbn' => $validateData['isbn'],
                'publisher' => $validateData['publisher'],
                'publication_date' => $validateData['publication_date'],
                'edication' => $validateData['edication'],
                'cover_image' => $coverImagePath,
                'total_copies' => $validateData['total_copies'],
                'genre_id' => $validateData['genre_id'],
            ]);
            if ($register_book) {
                return response()->json('success');
            }
            else{
                return response()->json('error');
                Storage::delete($coverImagePath);
            }
        }

        // Genre
        public function genre(){
            $genres = Genre::get();
            return view('book/genre', compact('genres'));
        }

        public function register_book_genre(){
            return view('book/register_book_genre');
        }

        public function register_book_genre_action(Request $request){
            $validateData = $request->validate([
                'name' => 'required'
            ]);
            $register_book_genre = Genre::create($validateData);
            if ($register_book_genre) {
                return response()->json('success');
            }
            else{
                return response()->json('error');
                Storage::delete($coverImagePath);
            }
        }

        // view_book
        public function view_book($id){
            $user = Auth::user()->id;
            $book = Book::with('genres')->find($id);
            return view('book/view_book', [
                'user' => $user,
                'book' => $book
            ]);
        }
        // edit_book
        public function edit_book($id){
            $book = Book::with('genres')->find($id);
            return view('book/edit_book', compact('book'));
        }
        public function update_book_detail(Request $request){
            $validateData = $request->validate([
                'id' => 'required',
                'book_title' => 'required',
                'author' => 'required',
                'isbn' => 'required',
                'publisher' => 'required',
                'publication_date' => 'required',
                'edication' => 'required',
                'total_copies' => 'required',
            ]);
            $bookId = $request->input('id');
            $book = Book::find($bookId);
            if (!$book) {
                return response()->json('error');
            }
            else{
                $book->update($validateData);
                if ($book->wasChanged()) {
                    return response()->json('success');
                }
            }
        }

        // borrow book
        public function borrow_this_book(Request $request){
            $validateData = $request->validate([
                'book_id' => 'required',
                'user_id' => 'required',
                'toBeReturnedOn' => 'required'
            ]);
            $borrow = Borrow::create($validateData);
            if ($borrow) {
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }

        // book_issued
        public function book_issued(){
            $borrowers = DB::select("SELECT genres.name as genre_name, books.id, books.book_title, books.edication, books.isbn, books.publication_date, books.total_copies, users.name as user_name, borrows.returned, borrows.toBeReturnedOn, borrows.created_at, borrows.id as borrow_id FROM genres, books, users, borrows WHERE books.genre_id = genres.id AND borrows.user_id = users.id AND borrows.book_id = books.id ");
            return view('book/book_issued', compact('borrowers'));
        }

        // return_this_book
        public function return_this_book(Request $request){
            $validateData = $request->validate([
                'id' => 'required',
            ]);
            $id = $request->input('id');
            if ($id) {
                DB::update("UPDATE `borrows` SET `returned` = '1' WHERE `borrows`.`id` = '$id'  ");
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }

        // borrow_info
        public function borrow_info($id){
            $add_fine = Borrow::with('users')->find($id); //$add_fine = DB::select("SELECT users.name as user_name, borrows.toBeReturnedOn, borrows.id as borrow_id FROM users, borrows WHERE borrows.user_id = users.id AND borrows.id = '$id' ")->first();
            return view('book/borrow_info', compact('add_fine'));
        }
        public function view_fine_action(Request $request){
            $validateData = $request->validate([
                'borrow_id' => 'required',
                'amount' => 'required',
            ]);
            $insert = Fine::create($validateData);
            if ($insert) {
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }

        // view_fine
        public function view_fine(){
            $fines = DB::select("SELECT fines.paid, fines.amount, fines.created_at, fines.id, books.book_title, users.name as user_name, borrows.toBeReturnedOn, borrows.created_at as borrow_date FROM fines, books, users, borrows WHERE fines.borrow_id = borrows.id AND borrows.user_id = users.id AND borrows.book_id = books.id ");
            return view('view_fine', compact('fines'));
        }

        // pay_my_fine
        public function pay_my_fine(Request $request){
            $validateData = $request->validate([
                'id' => 'required',
            ]);
            $id = $request->input('id');
            if ($id) {
                DB::update("UPDATE `fines` SET `paid` = '1' WHERE `fines`.`id` = '$id'  ");
                return response()->json('success');
            }
            else{
                return response()->json('error');
            }
        }
    }

