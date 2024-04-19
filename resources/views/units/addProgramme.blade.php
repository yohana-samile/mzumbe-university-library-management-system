@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>{{__('Register New Programme')}}</h6>
            </div>
            <div class="card-body">
                <form id="register_Programme">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('Programme name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="programme_abbreviation">{{__('Programme abbreviation')}}</label>
                        <input type="text" name="programme_abbreviation" id="programme_abbreviation" class="form-control" required>
                        <small>{{__('Eg ITS')}}</small>
                    </div>
                    <div class="mb-3">
                        <select name="unit_id" id="unit_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose Unit Belong')}}</option>
                            @if (!empty($units))
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register Programme" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/custom.js')}}"></script>
@endsection
