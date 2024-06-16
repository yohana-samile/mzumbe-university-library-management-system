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

    <nav class="navbar navbar-expand-md navbar-light bg-primary text-white shadow-sm" style="font-family: 'Times New Roman', Times, serif">
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
                    <li class="nav-item">
                        <a class="nav-link text-white" href="arms.mzumbe.ac.tz">{{ __('MU-ARMS') }}</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-white" href="admission.mzumbe.ac.tz">{{ __('Admission') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#usersummary">{{ __('TimeTable') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="learning.mzumbe.ac.tz">{{ __('E-learning') }}</a>
                    </li>

                    <li class="nav-item btn btn-sm btn-light float-right">
                        <a class="nav-link  text-dark float-right" href="{{ url('/login') }}"> {{__('Log Me In')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white float-right" href="{{ url('/studentLogin') }}"> {{__('In The Library')}} </a>
                    </li>
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
                        <p><img src="{{ asset('img/322.gif')}}" alt="service" width="30px"> {{$service->name}}</p>
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
                <div class="mb-3" style="height: 30rem; max-width: 40rem;">
                    <div class="card-body">
                        <p class="text-center">{{__('Library opening hours')}}</p>
                        <table id="tableToPrint" class="table table-striped mb-0">
                            <tbody>
                                @if (!empty($working_hours))
                                    @foreach ($working_hours as $working_hour)
                                        <tr>
                                            <td style="height: 5px;"><strong>{{$working_hour->day}}:</strong></td>
                                            <td>
                                                <span>
                                                    @if ($working_hour->holiday == 1)
                                                        <div class="badge badge-warning">It Is Holiday</div>
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
    <div class="container bg-light" style="font-family: 'Times New Roman', Times, serif">
        <div class="text-center">
            <h4>Realated Sites</h4>
            <input type="range" value="Our Services">
            <p style="font-family: 'Times New Roman', Times, serif">
                The MU Library maintains and provides access to a wide variety of online or electronic resources in various subjects. Electronic resources available are in the versions of e-books, and e-journals among others. MU Library subscribes to a wide variety of authoritative online databases such as EBSCO Host, Wiley, and Emerald, among others. Access of most of these resources are IP address based, meaning that they can be accessed within MU using the University internet.
            </p>
            <div id="announcement">
                <div class="row">
                    <div class="col-md-4">
                        <h5>EBSCO Host Research Databases:</h5>
                        <p>
                            Good coverage of most branches of social sciences and humanities, Strong business coverage, Strong nursing, medicine and allied health coverage, dedicated newspaper database
                        </p>
                        <p>
                            <a href="https://search.ebscohost.com/Community.aspx?ugt=62E771363C0635073716355632553E6226E360D36313639363E322E334133603&authtype=ip&stsug=AnG6dLPEHFmKy7pZfthnV5CY1KptjSn-4QzEG2_0WAF8mcKHS_GTwbyjlbIYec_mxlf7r--mZLCaQ6LAhFz6c7Mf4HFRE0YtMJWiiDMaKPW4h8xOAqLaZzOlG5KybEEEqTQEEheFlNnB-CWaORxkUPyVwqhOQXOweRPMcS84Q1tIcgc&IsAdminMobile=N&encid=22D731163C5635973796358632553C373643307373C373C373C372C374C376C370C331" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>Research for Global Justice (GOALI):</h5>
                        <p>
                            GOALI - Global Online Access to Legal Information is a new programme providing free or low- cost online access to legal research and training in the developing world.
                        </p>
                        <p>
                            <a href="https://www.ilo.org/goali" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>University of Chicago Press:</h5>
                        <p>
                            This database present original research in the social sciences, humanities, education, and biological and physical sciences.
                        </p>
                        <p>
                            <a href="https://press.uchicago.edu/index.html" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>IMF e-Library:</h5>
                        <p>
                            The IMF is viewed as one of the world’s most authoritative sources for economic information, analysis and harmonized statistics.
                        </p>
                        <p>
                            <a href="https://www.elibrary.imf.org/" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>University of California:</h5>
                        <p>
                            Subject strength: research, health, art & humanities
                        </p>
                        <p>
                            <a href="https://online.ucpress.ed%20u/journal" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h5>E-duke journals scholarly collection:</h5>
                        <p>
                            African studies, anthropology, art & art history, Asian studies, criticism & theory, cultural studies, economics, education, environmental humanities, ethnography, European studies, fiction & poetry, film & media studies, gender & sexuality studies, literary studies.
                        </p>
                        <p>
                            <a href="https://dlts.mzumbe.ac.tz/" target="_blank">Go To The Source</a>
                        </p>
                    </div>
                </div>
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
            © 2024 Copyright: (Stanley Mtui)
            <a class="text-body text-decoration-none" href="https://site.mzumbe.ac.tz/">Mzumbe University Library Management System</a>
        </div>
    </footer>
    <script>
        var jsonData = @json($data);
    </script>
    @extends('includes.footer1')
