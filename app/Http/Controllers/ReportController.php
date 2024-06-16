<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Book;
    use App\Models\Borrow;
    use App\Models\Fine;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    use Barryvdh\DomPDF\Facade\Pdf;
    use QuickChart;

    class ReportController extends Controller {
        public function generateReport() {
            $data = [
                'labels' => [],
                'data' => [],
            ];

            $queryResult = DB::select("
                SELECT units.unit_abbreviation AS unit_name, COUNT(time_entries.id) AS usage_count
                FROM time_entries
                JOIN users ON time_entries.user_id = users.id
                JOIN students ON users.id = students.user_id
                JOIN programmes ON students.programme_id = programmes.id
                JOIN units ON programmes.unit_id = units.id
                GROUP BY units.unit_abbreviation
            ");

            foreach ($queryResult as $result) {
                $data['labels'][] = $result->unit_name;
                $data['data'][] = $result->usage_count;
            }

            return view('reports/generate', compact('data', 'queryResult'));
        }

        public function downloadReport() {
            // Fetch books
            $books = Book::with('genres')->get();

            // Fetch borrow statistics
            $borrows = DB::select("SELECT * FROM borrows, users, books WHERE borrows.book_id = books.id AND borrows.user_id = users.id ");

            // Fetch fines
            $fines = Fine::with('borrows')->get();

            $data = [
                'labels' => [],
                'data' => [],
            ];

            $queryResult = DB::select("
                SELECT units.unit_abbreviation AS unit_name, COUNT(time_entries.id) AS usage_count
                FROM time_entries
                JOIN users ON time_entries.user_id = users.id
                JOIN students ON users.id = students.user_id
                JOIN programmes ON students.programme_id = programmes.id
                JOIN units ON programmes.unit_id = units.id
                GROUP BY units.unit_abbreviation
            ");

            foreach ($queryResult as $result) {
                $data['labels'][] = $result->unit_name;
                $data['data'][] = $result->usage_count;
            }

            $pdf = Pdf::loadView('reports.pdf', compact('data', 'queryResult', 'books', 'borrows', 'fines'));
            return $pdf->download('library_report.pdf');
        }
    }
