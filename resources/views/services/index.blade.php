@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Our Services
                    </div>
                    <div class="col-md-6 float-right">
                        <a href="{{url('services/add_service')}}" class="btn btn-primary float-right">Add Service <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (!empty($services))
                    @foreach ($services as $service)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="alert alert-primary back-widget-set text-center">
                                    <i class="fa fa-server fa-2x"></i>
                                    <h3>{{$service->name}}</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form id="delete_service">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$service->id}}" id="id" required>
                                    <button class="btn btn-danger text-white" type="submit" name="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
