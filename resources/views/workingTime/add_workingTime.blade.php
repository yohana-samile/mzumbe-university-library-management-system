@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <h6 class="m-0 font-weight-bold text-dark">Keep Woring Time</h6>
            </div>
            <div class="card-body">
                <form id="add_workingTime_action">
                    @csrf
                    <div class="mb-3">
                        <select name="day" id="day" class="form-control">
                            <option hidden selected disabled>Choose Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="open">{{__('Time From')}}</label>
                        <input type="time" name="open" id="open" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="close">{{__('Time To Close')}}</label>
                        <input type="time" name="close" id="close" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="holiday">{{__('Is IT Holiday?')}}</label>
                        <input type="checkbox" name="holiday" id="holiday" value="1">
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" class="form-control bg-primary text-white text-center" value="Make Schedule">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
