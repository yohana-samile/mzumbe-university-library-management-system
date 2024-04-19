@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Units Available</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('units/addUnit')}}" class="btn btn-primary btn-sm float-right">Register Unit<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table table-bordered text-capitalize table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Unit Name</th>
                                <th>Unit Abbreviation</th>
                                <th>Date Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Unit Name</th>
                                <th>Unit Abbreviation</th>
                                <th>Date Registered</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (!empty($units))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->unit_abbreviation }}</td>
                                        <td>{{ $unit->created_at }}</td>
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
