@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>{{__('Register New Librarian')}}</h6>
            </div>
            <div class="card-body">
                <form id="register_librarian">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('Librarian name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
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
                        <select name="education_qualification_id" id="education_qualification_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose Education Qualification')}}</option>
                            @if (!empty($education_qualifications))
                                @foreach ($education_qualifications as $education_qualification)
                                    <option value="{{ $education_qualification->id }}">{{ $education_qualification->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="libary_depertment_id" id="libary_depertment_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose libary depertment')}}</option>
                            @if (!empty($libary_depertments))
                                @foreach ($libary_depertments as $libary_depertment)
                                    <option value="{{ $libary_depertment->id }}">{{ $libary_depertment->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option selected hidden disabled>{{__('Choose position')}}</option>
                            @if (!empty($positions))
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
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
                        <input type="submit" value="Register Librarin Staff" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/custom.js')}}"></script>
@endsection
