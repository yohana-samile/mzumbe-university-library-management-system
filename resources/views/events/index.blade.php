@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="row">
            <div class="col-md-6">
                <p>Events And Announcements</p>
            </div>
            <div class="col-md-6">
                <a href="{{url('events/add_event')}}" class="btn btn-primary float-right">Add Service <i class="fa fa-plus"></i></a>
            </div>
        </div>
        @if (!empty($events))
            @foreach ($events as $key => $event)
                {{-- Start a new row for every third event --}}
                @if ($key % 3 == 0)
                    <div class="row">
                @endif
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <h4 class="card-title">Event Name {{$event->name}}</h4>
                            <img src="{{ asset('event_images/' . $event->event_image) }}" alt="Event Image" width="100%" height="150px">

                            <!-- <img src="{{Storage::url($event->event_image)}}" alt="" width="100%" height="150px"> -->
                            <p class="card-text"><a href="javascript::void()">Read More</a></p>
                            <form id="delete_event_or_announcement">
                                @csrf
                                <input type="hidden" name="id" value="{{$event->id}}" id="id" required>
                                <button class="btn btn-danger text-white" type="submit" name="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Close the row tag after every third event --}}
                @if (($key + 1) % 3 == 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
