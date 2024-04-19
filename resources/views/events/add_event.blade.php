@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <h6 class="m-0 font-weight-bold text-dark">Now You Can Add Event Or Announcement</h6>
            </div>
            <div class="card-body">
                <form id="add_event_action">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('Event Name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="event_image">{{__('Event event image')}}</label>
                        <input type="file" name="event_image" id="event_image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" class="form-control bg-primary text-white text-center" value="Add Event">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
