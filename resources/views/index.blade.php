@extends('includes.header')
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
                                <a class="nav-link text-white" href="#our_service">{{ __('Our Service') }}</a>
                            </li>
                        @endif

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#announcement">{{ __('Announcement') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#usersummary">{{ __('User Summary') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item btn btn-sm btn-light float-right">
                                <a class="nav-link  text-dark float-right" href="{{ url('/login') }}"> {{__('Log Me In')}} </a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url('img/cover/library2.jpg')}}" class="d-block w-100" alt="cover img" height="550px" width="100%">
            </div>
            <div class="carousel-item">
                <img src="{{url('img/cover/Statsbiblioteket_læsesalen-2.jpg')}}" class="d-block w-100" alt="cover img" height="550px" width="100%">
            </div>
            <div class="carousel-item">
                <img src="{{url('img/cover/library2.jpg')}}" class="d-block w-100" alt="cover img" height="550px" width="100%">
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

    <div class="container bg-light">
        <div class="text-center">
            <h4>Our Services</h4>
            <input type="range" value="Our Services">
        </div>
        <div class="list-group" id="our_service">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active" style="background-color: #ffffff; color:black">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
              </div>
              <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
              <small>Donec id elit non mi porta.</small>
            </a>
        </div>
        <div class="list-group my-4">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active" style="background-color: #ffffff; color:black">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">List group item heading</h5>
                  <small>posted 3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
        </div>
        <div class="list-group my-4">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active" style="background-color: #ffffff; color:black">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">List group item heading</h5>
                  <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
        </div>
    </div>

    {{-- announcement --}}
    <div class="container bg-light">
        <div class="text-center">
            <h4>Announcemnts and Events</h4>
            <input type="range" value="Our Services">
            <div class="row" id="announcement">
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- row-2 --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                          <h4 class="card-title">primary card title</h4>
                          <img src="{{url('img/cover/hero.jpg')}}" alt="" width="100%" height="150px">
                          <p class="card-text">Some quick example text to build on</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- usersummary --}}
    <div class="container bg-light my-4">
        <div class="text-center">
            <h4>User Summary</h4>
            <input type="range" value="Our Services">
            <div class="row" id="usersummary">
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 40rem;">
                        <div class="card-body">
                            <p class="card-title">Library opening hours</p>
                            <table id="tableToPrint" class="table table-striped mb-0">
                                <tbody>
                                    <tr>
                                        <td><strong>Monday:</strong></td>
                                        <td><span>09am to 03:00pm</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monday:</strong></td>
                                        <td><span>09am to 03:00pm</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monday:</strong></td>
                                        <td><span>09am to 03:00pm</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monday:</strong></td>
                                        <td><span>09am to 03:00pm</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Firday:</strong></td>
                                        <td><span>09am to 03:00pm</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="card-title my-4">Current User In The Library <span class="badge badge-primary">55</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 40rem;">
                        <div class="card-body">
                          <p class="card-title">Overall Users</p>
                          <table id="tableToPrint" class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td><strong>Monday:</strong></td>
                                    <td><span>33</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Monday:</strong></td>
                                    <td><span>45</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Monday:</strong></td>
                                    <td><span>66</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Monday:</strong></td>
                                    <td><span>65</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Firday:</strong></td>
                                    <td><span>12</span></td>
                                </tr>
                            </tbody>
                          </table>
                          <p class="card-title my-4">Current User In The Library <span class="badge badge-primary">55</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 100%">
            <div class="card-body">
              <p class="card-title">Pie Chart Show Usage Of Library</p>
              <img src="{{url('img/cover/64a8d6019c1edf566bc4f719_V2_1675967577563_18c10042-3799-4d69-b285-abb6ad68ba3d.png')}}" alt="pie chart" width="100%" height="500px">
            </div>
        </div>
    </div>
    {{-- footer --}}
    <div class="card">
    </div>
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
            © 2024 Copyright:
            <a class="text-body text-decoration-none" href="https://site.mzumbe.ac.tz/">Mzumbe University Library Management System</a>
        </div>
    </footer>
