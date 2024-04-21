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
                    @if ($userRole->role_name !== 'is_student')
                        <div class="col-md-6">
                            <a href="{{url('book/register_book')}}" class="btn btn-primary btn-sm float-right">Register Book<i class="fa fa-plus"></i></a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table table-bordered text-capitalize table-responsive">
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
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->total_copies }}</td>
                                        <td>
                                            {{-- for student see borrow btn --}}
                                            @if ($userRole->role_name === 'is_student')
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a href="{{url('book/view_book', [$book->id])}}">
                                                            <i class="fa fa-eye text-primary"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{url('book/view_book', [$book->id])}}" class="btn btn-sm btn-success"> Borrow </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a href="{{url('book/view_book', [$book->id])}}">
                                                            <i class="fa fa-eye text-primary"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="{{url('book/edit_book', [$book->id])}}">
                                                            <i class="fa fa-edit text-success"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </div>
                                                </div>
                                            @endif
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
