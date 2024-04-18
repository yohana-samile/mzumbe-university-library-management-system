@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-dark">Books Issued Records</h6>
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
                                <th>genre</th>
                                <th>Borrower Name</th>
                                <th>time borrow</th>
                                <th>To return</th>
                                <th>Returned</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>book title</th>
                                <th>publication date</th>
                                <th>genre</th>
                                <th>Borrower Name</th>
                                <th>time borrow</th>
                                <th>To return</th>
                                <th>Returned</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($borrowers))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($borrowers as $borrower)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $borrower->book_title }}</td>
                                        <td>{{ $borrower->publication_date }}</td>
                                        <td>{{ $borrower->genre_name }}</td>
                                        <td>{{ $borrower->user_name }}</td>
                                        <td>{{ $borrower->created_at }}</td>
                                        <td>{{ $borrower->toBeReturnedOn }}</td>
                                        <td class="text-center">
                                            @if ($borrower->returned == 0)
                                                <div class="fa fa-times text-center text-danger"></div>
                                            @else
                                                <div class="fa fa-check text-center text-primary"></div>
                                            @endif
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{url('book/view_fine', [$borrower->borrow_id])}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Fine">
                                                        <i class="fa fa-eye text-primary"></i>
                                                    </a>
                                                </div>
                                                @if ($borrower->returned == 0)
                                                    <div class="col-md-8">
                                                        {{-- <form action="return_this_book" method="post"> --}}
                                                        <form id="return_this_book">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$borrower->borrow_id }}" id="id">
                                                            <input type="submit" class="btn btn-success btn-sm float-right my-4" value="return">
                                                        </form>
                                                    </div>
                                                @endif
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
