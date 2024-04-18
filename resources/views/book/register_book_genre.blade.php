@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>Register book genre</h6>
            </div>
            <div class="card-body">
                {{-- <form method="POST" action="/book/register_book_genre_action"> --}}
                <form id="register_book_genre_action">
                    @csrf
                    <div class="mb-3">
                        <label for="name">{{__('book genre name')}}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{url('js/custom.js')}}"></script>
@endsection
