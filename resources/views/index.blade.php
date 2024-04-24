@extends('includes.header')
@php
    use App\Models\Service;
    use App\Models\Event_and_announcement;
    use App\Models\Opening_hour;
    $services = Service::take(4)->get()->sortByDesc('created_at');
    $events = Event_and_announcement::take(6)->get()->sortByDesc('created_at');
    $working_hours = Opening_hour::take(7)->get()->sortByDesc('created_at');
    use Illuminate\Support\Facades\DB;
    $current_user_in_library = DB::table('time_entries')
        ->whereNull('time_out')
        ->count();
    // trends
    use Carbon\Carbon;
    // for pie chart
    $data = [
        'labels' => [],
        'data' => [],
    ];

    $queryResult = DB::select("
        SELECT units.unit_abbreviation AS unit_name, COUNT(time_entries.id) AS usage_count
        FROM time_entries
        JOIN users ON time_entries.user_id = users.id
        JOIN students ON users.id = students.user_id
        JOIN programmes ON students.programme_id = programmes.id
        JOIN units ON programmes.unit_id = units.id
        GROUP BY units.unit_abbreviation
    ");

    foreach ($queryResult as $result) {
        $data['labels'][] = $result->unit_name;
        $data['data'][] = $result->usage_count;
    }
@endphp

    <nav class="navbar navbar-expand-md navbar-light bg-primary text-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">{{ __('MU-Library Management System') }}</a>
            {{-- <a class="navbar-brand btn btn-sm btn-danger text-white" href="{{ url('/login') }}"> {{__('Log Me In')}} </a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="arms.mzumbe.ac.tz">{{ __('MU-ARMS') }}</a>
                            </li>
                        @endif

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admission.mzumbe.ac.tz">{{ __('Admission') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#usersummary">{{ __('TimeTable') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="learning.mzumbe.ac.tz">{{ __('E-learning') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item btn btn-sm btn-light float-right">
                                <a class="nav-link  text-dark float-right" href="{{ url('/login') }}"> {{__('Log Me In')}} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white float-right" href="{{ url('/studentLogin') }}"> {{__('In The Library')}} </a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="alert alert-success text-center"> Current User In The Library <br><br>  <span class="text-dark alert alert-light my-4">{{$current_user_in_library}}</span></div>
                {{-- our services --}}
                <div class="text-center" id="our_service">
                    <h4>Our Services</h4>
                </div>
                @if (!empty($services))
                    @foreach ($services as $service)
                        <div class="alert alert-primary back-widget-set text-center">
                            <i class="fa fa-server fa-2x"></i>
                            <h6>{{$service->name}}</h6>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- image sld --}}
            <div class="col-md-6">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{url('img/cover/library2.jpg')}}" class="d-block w-100" alt="cover img" height="330px" width="100%">
                        </div>
                        <div class="carousel-item">
                            <img src="{{url('img/cover/Statsbiblioteket_læsesalen-2.jpg')}}" class="d-block w-100" alt="cover img" height="330px" width="100%">
                        </div>
                        <div class="carousel-item">
                            <img src="{{url('img/cover/library2.jpg')}}" class="d-block w-100" alt="cover img" height="330px" width="100%">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('Previous')}}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('Next')}}</span>
                    </button>
                </div>

                {{-- pie chart --}}
                <div class="container mx-auto"  style="max-width: 100%; height: 300px;">
                    <p class="text-center">Pie Chart Show Usage Of Library By Unit</p>
                    <canvas id="myPieChart" width="400" height="400" class="mx-auto"></canvas>
                </div>
            </div>
            {{-- >Library opening hours --}}
            <div class="col-md-3">
                <div class="mb-3" style="max-width: 40rem;">
                    <div class="card-body">
                        <p class="text-center">{{__('Library opening hours')}}</p>
                        <table id="tableToPrint" class="table table-striped mb-0">
                            <tbody>
                                @if (!empty($working_hours))
                                    @foreach ($working_hours as $working_hour)
                                        <tr>
                                            <td><strong>{{$working_hour->day}}:</strong></td>
                                            <td>
                                                <span>
                                                    @if ($working_hour->holiday == 1)
                                                        <div class="alert alert-warning">It Is Holiday</div>
                                                    @else
                                                        {{$working_hour->open}}am To {{$working_hour->close}}pm
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- event --}}
            </div>
        </div>
    </div><br>

    {{-- usersummary --}}
    <div class="container bg-white my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    <h4>Over All User Summary (Visitors)</h4>
                    <input type="range" value="Our Services">
                    <div id="usersummary">
                        <div class="card mb-3">
                            <div class="card-body">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h4 class="text-center">Contact Us</h4>
                    <input type="range" value="Our Services">
                </div>
                <form action="">
                    <div class="mb-3">
                        <label for="name">Enter Your name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email">Enter Your Email</label>
                        <input type="text" name="Email" id="Email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Message">Enter Your Message</label>
                        <textarea name="Message" id="Message" cols="5"  class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" class="form-control bg-primary text-white">
                </form>
            </div>
        </div>
    </div>


    {{-- announcement --}}
    <div class="container bg-light">
        <div class="text-center">
            <h4>Announcemnts and Events</h4>
            <input type="range" value="Our Services">
            <div id="announcement">
                @if (!empty($events))
                <div class="row">
                    @foreach ($events as $key => $event)
                        <div class="col-md-4">
                            <div class="card border-primary mb-3" style="max-width: 20rem;">
                                <div class="card-body">
                                    <h4 class="card-title">Event Name {{$event->name}}</h4>
                                    <img src="{{Storage::url($event->event_image)}}" alt="" width="100%" height="150px">
                                    <p class="card-text"><a href="javascript:void(0)">Read More</a></p>
                                </div>
                            </div>
                        </div>

                        {{-- Check if it's the last card or the third card in a row --}}
                        @if (($key + 1) % 3 == 0 || $loop->last)
                            </div> {{-- Close the row --}}
                            {{-- If it's not the last event, open a new row --}}
                            @if (!$loop->last)
                                <div class="row">
                            @endif
                        @endif
                    @endforeach
                </div>

                @endif
            </div>
        </div>
    </div>

    {{-- footer --}}
    <footer class="bg-body-tertiary text-center">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="https://web.facebook.com/officialmzumbeuniversity?_rdc=1&_rdr" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="https://twitter.com/officialmzumbe" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="https://www.instagram.com/officialmzumbeuniversity/" role="button"><i class="fab fa-instagram"></i></a>

                <!-- youtube -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #c14332e6;" href="https://www.youtube.com/channel/UCbB-VhZYvzAudenWGFKKZzg" role="button"><i class="fab fa-youtube"></i></a>

            </section>
        </div>

        <!--  -->
        <div class="text-center p-3" style="background-color: rgba(171, 157, 157, 0.554);">
            © 2024 Copyright: (Stanlay Mtui)
            <a class="text-body text-decoration-none" href="https://site.mzumbe.ac.tz/">Mzumbe University Library Management System</a>
        </div>
    </footer>
    <script>
        var jsonData = @json($data);
    </script>
    @extends('includes.footer1')
