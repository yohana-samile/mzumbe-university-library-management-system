@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>{{__('Register New Student')}}</h6>
            </div>
            <div class="card-body">
                <form id="register_student">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('Student name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob">{{__('Enter dob')}}</label>
                        <input type="date" name="dob" id="dob" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="physical_address">{{__('Physical Address')}}</label>
                        <input type="text" name="physical_address" id="physical_address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">{{__('Phone Number')}}</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="programme_id" id="programme_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose Programme Of Study')}}</option>
                            @if (!empty($programmes))
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="year_of_study_id" id="year_of_study_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose Year Of Study')}}</option>
                            @if (!empty($year_of_studys))
                                @foreach ($year_of_studys as $year_of_study)
                                    <option value="{{ $year_of_study->id }}">{{ $year_of_study->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="gender" id="gender" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose gender')}}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register Student" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/custom.js')}}"></script>
@endsection
