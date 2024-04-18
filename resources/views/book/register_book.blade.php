@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card">
            <div class="card-header">
                <h6>Register new book </h6>
            </div>
            <div class="card-body">
                {{-- <form method="POST" action="register_book_action"> --}}
                <form id="register_book_action">
                    @csrf
                    <div class="mb-3">
                        <label for="book_title">{{__('book title')}}</label>
                        <input type="text" name="book_title" id="book_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="author">{{__('author')}}</label>
                        <input id="author" type="text" class="form-control" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbn">{{__('isbn')}}</label>
                        <input id="isbn" type="text" class="form-control" name="isbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisher">{{__('publisher')}}</label>
                        <input id="publisher" type="text" class="form-control" name="publisher" required>
                    </div>
                    <div class="mb-3">
                        <label for="publication_date">{{__('publication date')}}</label>
                        <input id="publication_date" type="date" class="form-control" name="publication_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edication">{{__('edication')}}</label>
                        <input id="edication" type="text" class="form-control" name="edication" required>
                    </div>
                    <div class="mb-3">
                        <label for="cover_image">{{__('cover image')}}</label>
                        <input id="cover_image" type="file" class="form-control" name="cover_image" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_copies">{{__('total copies')}}</label>
                        <input id="total_copies" type="number" class="form-control" name="total_copies" required>
                    </div>
                    <div class="mb-3">
                        <select name="genre_id" class="form-control" id="genre_id">
                            <option selected disabled hidden>Choose Genre</option>
                            @if (!empty($genres))
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register" class="form-control bg-primary text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
