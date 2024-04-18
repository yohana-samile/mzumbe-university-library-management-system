@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header py-3 text-capitalize">
                <h6 class="m-0 font-weight-bold text-dark">Edit Thi Book: {{$book->book_title}}</h6>
            </div>
            <div class="card-body">
                <form id="update_book_detail">
                    @csrf
                    <div class="mb-3">
                        <label for="book_title">{{__('book title')}}</label>
                        <input type="hidden" name="id" id="id" value="{{$book->id}}" class="form-control" required>
                        <input type="text" name="book_title" id="book_title" value="{{$book->book_title}}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="author">{{__('author')}}</label>
                        <input id="author" type="text" class="form-control" value="{{$book->author}}" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbn">{{__('isbn')}}</label>
                        <input id="isbn" type="text" class="form-control" value="{{$book->isbn}}" name="isbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisher">{{__('publisher')}}</label>
                        <input id="publisher" type="text" class="form-control" value="{{$book->publisher}}" name="publisher" required>
                    </div>
                    <div class="mb-3">
                        <label for="publication_date">{{__('publication date')}}</label>
                        <input id="publication_date" type="date" class="form-control" value="{{$book->publication_date}}" name="publication_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edication">{{__('edication')}}</label>
                        <input id="edication" type="text" class="form-control" value="{{$book->edication}}" name="edication" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_copies">{{__('total copies')}}</label>
                        <input id="total_copies" type="number" value="{{$book->total_copies}}" class="form-control" name="total_copies" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="form-control bg-success text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
