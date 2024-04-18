@extends('includes.header')
@php
    use App\Models\User;
    use App\Models\Role;
    use Illuminate\Support\Facades\DB;
    $userId = Auth::user()->id;
    $userRole = User::with('roles')->find($userId);
@endphp
@if (Auth::user())
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar accordion" id="accordionSidebar" style="background-color:  rgb(235, 233, 233">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
                <div class="sidebar-brand-icon rotate-n-10">
                    <img src="{{url("img/cover/logo.png")}}" alt="logo" width="80px">
                </div>
                <div class="sidebar-brand-text mx-3 text-dark">{{__("MULMS")}}</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__("Dashboard")}}</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                {{__("Book")}}
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBook"
                    aria-expanded="true" aria-controls="collapseBook">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>{{__("Book")}}</span>
                </a>
                <div id="collapseBook" class="collapse" aria-labelledby="headingBook" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{__("Books:")}}</h6>
                        {{-- @if ($userRole->name != 'is_student') --}}
                        {{-- @endif --}}
                        <a class="collapse-item" href="{{ url('book/index')}}">{{__('Books')}}</a>
                        <a class="collapse-item" href="{{ url('book/genre')}}">{{__('Genres')}}</a>
                    </div>
                </div>
            </li>

            {{-- @if ($user->roles->where('name', '!=', 'is_student')->isNotEmpty()) --}}
            @if ($userRole->name != 'is_student')
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    {{__("Lesson")}}
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLesson"
                        aria-expanded="true" aria-controls="collapseLesson">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Lesson</span>
                    </a>
                    <div id="collapseLesson" class="collapse" aria-labelledby="headingLesson" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Lesson:</h6>
                            <a class="collapse-item" href="buttons.html">Buttons</a>
                            <a class="collapse-item" href="cards.html">Cards</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    {{__("Subjects")}}
                </div>
                <!-- Nav Item - Subjects Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubjects"
                        aria-expanded="true" aria-controls="collapseSubjects">
                        <i class="fas fa-fw fa-book"></i>
                        <span>{{__("Subjects")}}</span>
                    </a>
                    <div id="collapseSubjects" class="collapse" aria-labelledby="headingSubjects"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">{{__("Subjects:")}}</h6>
                            <a class="collapse-item" href="{{url("subject/index")}}">{{__("Manage Subject")}}</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    {{__("Users")}}
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>{{__("User")}}</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <h6 class="collapse-header">{{__("Manage User:")}}</h6>
                            <a class="collapse-item" href="{{ url("staff")}}">{{__("Staff")}}</a>
                            <a class="collapse-item" href="{{ url("student")}}">{{__("Students")}}</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    {{__("Utilities")}}
                </div>
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-book"></i>
                        <span>{{__("Utilities")}}</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">{{__("Utilities:")}}</h6>
                            <a class="collapse-item" href="{{ url('utilities/grade') }}">{{__("Grade")}}</a>
                            <a class="collapse-item" href="{{ url('utilities/education_qualification') }}">{{__("Education qualification")}}</a>
                            <a class="collapse-item" href="{{ url('utilities/form') }}">{{__("Form")}}</a>
                            <a class="collapse-item" href="{{ url('utilities/semester') }}">{{__("Semester")}}</a>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="bg-white">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ url("img/undraw_profile.svg")}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{__("Profile")}}
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{__("Activity Log")}}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{__("Logout")}}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid bg-white">

                    <main class="py-4">
                        @yield('content')
                    </main>

                </div>
            </div>
            <!-- End of Main Content -->
    @endif
@extends('includes.footer')
