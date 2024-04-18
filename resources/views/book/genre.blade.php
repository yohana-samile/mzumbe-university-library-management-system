@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Books Genre</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('book/register_book_genre')}}" class="btn btn-primary btn-sm float-right">Register Book Genre<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-borded text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Genre Name</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Genre Name</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($genres))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($genres as $genre)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $genre->name }}</td>
                                        <td>{{ $genre->created_at }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <i class="fa fa-edit text-success"></i>
                                                </div>
                                                <div class="col-md-6">
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
