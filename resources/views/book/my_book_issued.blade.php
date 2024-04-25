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
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table table-bordered text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>book title</th>
                                <th>Borrower Name</th>
                                <th>Borrow Stats</th>
                                <th>To return</th>
                                <th>Return Stats</th>
                                <th>time borrow</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>book title</th>
                                <th>Borrower Name</th>
                                <th>Borrow Stats</th>
                                <th>To return</th>
                                <th>Return Stats</th>
                                <th>time borrow</th>
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
                                        <td>{{ $borrower->user_name }}</td>
                                        <td>
                                            @if ($borrower->borrow_status == 'pending')
                                                <div class="badge badge-warning">{{ $borrower->borrow_status }}</div>
                                            @elseif ($borrower->borrow_status == 'approved')
                                                <div class="badge badge-success">{{ $borrower->borrow_status }}</div>
                                            @elseif ($borrower->borrow_status == 'denied')
                                                <div class="badge badge-danger">{{ $borrower->borrow_status }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $borrower->toBeReturnedOn }}</td>
                                        <td>
                                            @if ($borrower->return_status == 'not return')
                                                <div class="badge badge-danger">{{ $borrower->return_status }} <i class="fa fa-times text-center text-white"></i></div>
                                            @elseif ($borrower->return_status == 'not approval')
                                                <div class="badge badge-warning">{{ $borrower->return_status }}</div>
                                            @elseif ($borrower->return_status == 'returned')
                                                <div class="badge badge-success">{{ $borrower->return_status }} <i class="fa fa-check text-center text-white"></i></div>
                                            @endif
                                        </td>
                                        <td>{{ $borrower->created_at }}</td>
                                        <td>
                                            <div class="row">
                                                @if ($userRole->role_name === 'is_student')
                                                    @if ($borrower->borrow_status == 'approved')
                                                        @if ($borrower->return_status != 'not approval' && $borrower->return_status != 'returned')
                                                            <form action="{{ url('/book/return_this_book', ['id' => $borrower->borrow_id ])}}" method="post">
                                                                @csrf
                                                                <input type="submit" class="btn btn-success btn-sm float-right my-4" value="return">
                                                            </form>
                                                        @endif
                                                    @endif
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
