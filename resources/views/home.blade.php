@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-6">
                <a href="{{url('book/index')}}">
                    <div class="alert alert-success back-widget-set text-center">
                        <i class="fa fa-book fa-2x"></i>
                        <h3>44</h3>
                        Books Available
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <a href="{{url('book/index')}}">
                    <div class="alert alert-danger back-widget-set text-center">
                        <i class="fa fa-user fa-2x"></i>
                        <h3>44</h3>
                        Users
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-3">
                <a href="{{url('book/index')}}">
                    <div class="alert alert-primary back-widget-set text-center">
                        <i class="fa fa-book fa-2x"></i>
                        <h3>44</h3>
                        Books Borrowed
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-3">
                <a href="{{url('book/index')}}">
                    <div class="alert alert-primary back-widget-set text-center">
                        <i class="fa fa- fa-2x">$</i>
                        <h3>4000</h3>
                        Fine Collected
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
