@extends('layouts.app')
@php
    $currentDate = 'Y-m-d';
@endphp
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="m-0 font-weight-bold text-dark">Borrow Record id <span class="badge badge-primary"> MULMS-{{ $add_fine->id }}</span></h6>
                </div>
            </div>
            <div class="card-body">
                <h6>Add Pernalty fee For This Student</h6>
                @if ($add_fine->toBeReturnedOn < $currentDate)
                    <form id="add_fine_to_this_student">
                        @csrf
                        <div class="mb-3">
                            <label for="amount">Enter Amount</label>
                            <input type="hidden" name="borrow_id" id="borrow_id" value="{{ $add_fine->id }}" class="form-control" required>
                            <input type="number" name="amount" id="amount" min="1000" max="5000" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" class="form-control bg-primary text-white" value="Submit">
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning">You Cant Add Fine To This Student</div>
                @endif
            </div>
        </div>
    </div>
@endsection
