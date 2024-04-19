@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Librarian Staff Registered</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('users/register_staff')}}" class="btn btn-primary btn-sm float-right">Register New Librarian<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-bordered text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Education</th>
                                <th>department</th>
                                <th>position</th>
                                <th>gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Education</th>
                                <th>department</th>
                                <th>position</th>
                                <th>gender</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($librarians))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($librarians as $librarian)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $librarian->librarian_name }}</td>
                                        <td>{{ $librarian->email }}</td>
                                        <td>{{ $librarian->education_qualification_name }}</td>
                                        <td>{{ $librarian->libary_depertment_name }}</td>
                                        <td>{{ $librarian->position_name }}</td>
                                        <td>{{ $librarian->gender }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="javascript::void()">
                                                        <i class="fa fa-eye text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript::void()">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
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
