@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>Register New Unit</h6>
            </div>
            <div class="card-body">
                <form id="register_unit">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('unit name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_abbreviation">{{__('unit abbreviation')}}</label>
                        <input type="text" name="unit_abbreviation" id="unit_abbreviation" class="form-control" required>
                        <small>Eg FST</small>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register Unit" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/custom.js')}}"></script>
@endsection
