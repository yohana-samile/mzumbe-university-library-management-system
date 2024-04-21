@extends('layouts.app')
@section('content')
    <div class="container">
        @include('includes.urls')
        <div class="card mb-3 mx-auto" style="max-width: 40rem;">
            <div class="card-body">
            <p class="card-title">Overall Users</p>
            <table id="tableToPrint" class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Count Users</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $daysOfWeek = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                    @endphp
                    @foreach ($daysOfWeek as $day)
                        @php
                            // Get the count for the current day
                            $query = DB::table('time_entries')
                                ->select(DB::raw('COUNT(time_in) as count'))
                                ->whereRaw("DAYNAME(time_in) = '$day'")
                                ->first();
                            $count = $query ? $query->count : 0;
                        @endphp
                        <tr>
                            <td><strong>{{ $day }}:</strong></td>
                            <td>{{ $count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p class="card-title my-4">Current User In The Library <span class="badge badge-primary">{{$current_user_in_library}}</span></p>
            </div>
        </div>
@endsection
