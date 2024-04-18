@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Books Available</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('book/register_book')}}" class="btn btn-primary btn-sm float-right">Register Book<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-borded text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>book title</th>
                                <th>publication date</th>
                                <th>edication</th>
                                <th>genre</th>
                                <th>total copies</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>book title</th>
                                <th>publication date</th>
                                <th>edication</th>
                                <th>genre</th>
                                <th>total copies</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($books))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $book->book_title }}</td>
                                        <td>{{ $book->publication_date }}</td>
                                        <td>{{ $book->edication }}</td>
                                        <td>{{ $book->genres->name }}</td>
                                        <td>{{ $book->total_copies }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="fa fa-edit text-success"></i>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
