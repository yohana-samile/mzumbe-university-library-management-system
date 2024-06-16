<!DOCTYPE html>
<html>
<head>
    <title>Library Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h4>Library Usage Report</h4>
    <table>
        <thead>
            <tr>
                <th>Unit Name</th>
                <th>Usage Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($queryResult as $row)
                <tr>
                    <td>{{ $row->unit_name }}</td>
                    <td>{{ $row->usage_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Book Available Report</h4>
    <table>
        <thead>
            <tr>
                <th>book_title</th>
                <th>author</th>
                <th>isbn</th>
                <th>publisher</th>
                <th>publication_date</th>
                <th>edication</th>
                <th>total_copies</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->publication_date }}</td>
                    <td>{{ $book->edication }}</td>
                    <td>{{ $book->total_copies }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Fines Report</h4>
    <table>
        <thead>
            <tr>
                <th>Borrower_id</th>
                <th>Amount</th>
                <th>Payment Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($fines as $fine)
                <tr>
                    <td>{{ $fine->id }}</td>
                    <td>{{ $fine->amount }}</td>
                    <td>
                        @if ($fine->paid == 1)
                            <p>Paid</p>
                        @else
                            <p>Not Paid</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Borrow Report</h4>
    <table>
        <thead>
            <tr>
                <th>book_title</th>
                <th>borrower name</th>
                <th>return date</th>
                <th>borrow status</th>
                <th>return status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->book_title }}</td>
                    <td>{{ $borrow->name }}</td>
                    <td>{{ $borrow->toBeReturnedOn }}</td>
                    <td>{{ $borrow->borrow_status }}</td>
                    <td>
                        @if ($borrow->returned == 1)
                            <p>Paid</p>
                        @else
                            <p>Not Paid</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
