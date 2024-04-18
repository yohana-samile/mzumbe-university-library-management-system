<?php
    namespace App\Http\Controllers\Book;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Book;
    use App\Models\Genre;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonResponse;
    use DB;
    use Illuminate\Support\Facades\Storage;


    class BookController extends Controller {
        public function index(){
            $books = Book::with('genres')->get();
            return view('book/index', compact('books'));
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
            $coverImagePath = $request->file('cover_image')->store('book-covers');
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
    }

