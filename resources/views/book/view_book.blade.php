@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <h6 class="m-0 font-weight-bold text-dark">Book Title: {{$book->book_title}}</h6>
                <img src="{{ asset($book->cover_image) }}"  alt="book-cover" width="100%" height="450px">
                <!-- <img src="{{ Storage::url($book->cover_image) }}" alt="book-cover" width="100%" height="450px"> -->
                <table id="tableToPrint" class="table table-striped mb-0">
                    <tbody>
                        <tr>
                            <td><strong>Author:</strong></td>
                            <td><span>{{$book->author}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>ISBN:</strong></td>
                            <td><span>{{$book->isbn}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>publication date:</strong></td>
                            <td><span>{{$book->publication_date}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>publisher:</strong></td>
                            <td><span>{{$book->publisher}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>edication:</strong></td>
                            <td><span>{{$book->edication}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>total copies:</strong></td>
                            <td><span>{{$book->total_copies}}</span></td>
                        </tr>
                    </tbody>
                </table>
                @if ($userRole->role_name === 'is_student')
                    <form id="borrow_this_book">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$book->id}}" id="book_id">
                        <input type="hidden" name="user_id" value="{{$user}}" id="user_id">
                        <input type="hidden" name="toBeReturnedOn" id="toBeReturnedOn">
                        <input type="submit" class="btn btn-primary float-right my-4" value="Borrow This Book">
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
