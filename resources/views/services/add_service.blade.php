@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <h6 class="m-0 font-weight-bold text-dark">Now You Can Add Services</h6>
            </div>
            <div class="card-body">
                <form id="add_service_action">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('Service Name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" class="form-control bg-primary text-white text-center" value="Add Service">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
