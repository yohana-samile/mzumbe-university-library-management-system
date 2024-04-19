@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Students Registered</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('users/register_student')}}" class="btn btn-primary btn-sm float-right">Register New Student<i class="fa fa-plus"></i></a>
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
                                <th>Registration Number</th>
                                <th>Programme Name</th>
                                <th>Year</th>
                                <th>gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Registration Number</th>
                                <th>Programme Name</th>
                                <th>Year</th>
                                <th>gender</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($students))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $student->student_name }}</td>
                                        <td>{{ $student->regstration_number }}</td>
                                        <td>{{ $student->programme_abbreviation }}</td>
                                        <td>{{ $student->year_of_study_name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="javascript::void()">
                                                        <i class="fa fa-eye text-primary"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="javascript::void()">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="btn btn-sm btn-success">fingerprint <i class="fa fa-plus"></i></div>
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
