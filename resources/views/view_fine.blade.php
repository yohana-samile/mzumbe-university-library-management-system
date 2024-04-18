@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-dark">Borrow Pelnaty</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-bordered text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Payer</th>
                                <th>Book Title</th>
                                <th>Date Borrowed</th>
                                <th>To return</th>
                                <th>Amount</th>
                                <th>paid at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Payer</th>
                                <th>Book Title</th>
                                <th>Date Borrowed</th>
                                <th>To return</th>
                                <th>Amount</th>
                                <th>paid at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($fines))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($fines as $fine)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $fine->user_name }}</td>
                                        <td>{{ $fine->book_title }}</td>
                                        <td>{{ $fine->borrow_date }}</td>
                                        <td>{{ $fine->toBeReturnedOn }}</td>
                                        <td>{{ $fine->amount }}</td>
                                        <td>{{ $fine->created_at }}</td>
                                        <td class="text-center">
                                            @if ($fine->paid == 0)
                                                <div class="fa fa-times text-center text-danger"></div>
                                            @else
                                                <div class="fa fa-check text-center text-primary"></div>
                                            @endif
                                        <td class="sm">
                                            @if ($fine->paid == 0)
                                                {{-- <form action="paid_pay_fine" method="post"> --}}
                                                <form id="pay_my_fine">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$fine->id }}" id="id">
                                                    <input type="submit" class="btn btn-success btn-sm float-right my-4" value="Pay">
                                                </form>
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
