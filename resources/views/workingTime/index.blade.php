@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-dark">MU-L Woring Hours</h6>
                    </div>
                    <div class="col-md-6 float-right">
                        <a href="{{url('workingTime/add_workingTime')}}" class="float-right text-white btn btn-primary">Add Working Hour <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="tableToPrint" class="table table-striped mb-0">
                    <tbody>
                        @if (!empty($working_hours))
                            @foreach ($working_hours as $working_hour)
                                <tr>
                                    <td><strong>{{$working_hour->day}}:</strong></td>
                                    <td>
                                        <span>
                                            @if ($working_hour->holiday == 1)
                                                <div class="alert alert-warning">It Is Holiday</div>
                                            @else
                                                {{$working_hour->open}}am To {{$working_hour->close}}pm
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
