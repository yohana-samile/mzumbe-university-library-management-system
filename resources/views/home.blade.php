@extends('layouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\DB;
    $current_user_in_library = DB::table('time_entries')
        ->whereNull('time_out')
        ->count();
    $unreturned_books = DB::table('borrows')->where('returned', 0)->count();
    $fine_collected = DB::select("SELECT SUM(amount) AS total_fine FROM fines")[0]->total_fine;
    $users_registered = DB::table('users')->count();
    $books_available = DB::table('books')->count();
    $userId = Auth::user()->id;
    $userRole = DB::select("SELECT roles.name as role_name, users.id from roles, users where users.role_id = roles.id and users.id = '$userId' ");
    $userRole = $userRole[0];
@endphp
    <div class="container">
        @if ($userRole->role_name !== 'is_student')
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a href="{{url('/view_fine')}}" class="text-decoration-none">
                        <div class="alert alert-primary back-widget-set text-center">
                            <i class="fa fa- fa-2x">Tsh</i>
                            <h3>{{$fine_collected}}</h3>
                            Fine Collected
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <a href="{{url('/users/student')}}" class="text-decoration-none">
                        <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-user fa-2x"></i>
                            <h3>{{$users_registered}}</h3>
                            Users
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-3">
                    <a href="{{url('/book/book_issued')}}" class="text-decoration-none">
                        <div class="alert alert-primary back-widget-set text-center">
                            <i class="fa fa-book fa-2x"></i>
                            <h3>{{$unreturned_books}}</h3>
                            Books Borrowed
                        </div>
                    </a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-3">
                <a href="{{url('book/index')}}" class="text-decoration-none">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-book fa-2x"></i>
                        <h3>{{$books_available}}</h3>
                        Books Available
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-3">
                <a href="{{url('/workingTime/over_all_users')}}" class="text-decoration-none">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-users fa-2x"></i>
                        <h3>{{$current_user_in_library}}</h3>
                        Current Users In Library
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
