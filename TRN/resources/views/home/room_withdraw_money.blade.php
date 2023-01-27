@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Withdraw Money</title>
<script type="text/javascript" src="{{url('/')}}/assets/nepali-date-picker.min.js"></script>
<link rel="stylesheet" href="{{url('/')}}/assets/nepali-date-picker.min.css">

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{url('/home/dashboard')}}" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">{{Session::get('name')}}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">{{$contact}}</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have {{$contact}} notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @foreach($viewcontact as $contacts)
                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-success"></i>
                            <div>
                                <h4>{{$contacts['name']}}</h4>
                                <p>{{$contacts['message']}}</p>
                                <p>{{$contacts['created_at']->diffForHumans()}}</p>
                            </div>

                        </li>
                        <hr class="dropdown-divider">
                        @endforeach


                        <li class="dropdown-footer">
                            <a href="{{route('home.messages')}}">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <label alt="Profile"
                            class="w3-circle bg-success py-2 px-3 text-white h5"><?php $name=Session::get('name'); echo substr("$name",0,1);?></label>
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{Session::get('name')}}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{Session::get('name')}}</h6>
                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('/home/profile')}}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('/home/profile')}}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('/home/dashboard/logout')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{url('/home/dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>TRN Management System</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{url('/home/passwords')}}">
                            <i class="bi bi-circle"></i><span>Passwords</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('home.notes')}}">
                            <i class="bi bi-circle"></i><span>Notes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('home.messages')}}">
                            <i class="bi bi-circle"></i><span>Messages</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Room Expenses</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{url('/home/room_management')}}">
                            <i class="bi bi-circle"></i><span>Expenses Management System</span>
                        </a>

                        <a href="{{url('/home/room_management/deposit_money')}}">
                            <i class="bi bi-circle"></i><span>Deposit Money </span>
                        </a>

                        <a href="{{url('/home/room_management/withdraw_money')}}">
                            <i class="bi bi-circle"></i><span>Withdraw Money </span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>TRN Finance System</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Growth Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>Expenses Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>ECharts</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>TRN Projects</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Remix Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-boxicons.html">
                            <i class="bi bi-circle"></i><span>Boxicons</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('/home/profile')}}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('/home/dashboard/logout')}}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->





        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Withdraw Money</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/home/room_management')}}">Room Management</a>
                    </li>
                    <li class="breadcrumb-item active">Withdraw Money</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <div class="card">

            <div class="text-center">
                <h2 id="heading" class="card-title p-0 m-0 text-light p-3 bg-success">Room | Withdraw Money</h2>
            </div>
            <br>


            <form action="{{url('/home/room_management/withdraw_money')}}" method="post">
                @if(Session::has('success'))
                <script>
                toastr.success("{{Session::get('success')}}")
                </script>
                @endif
                @if(Session::has('fail'))
                <script>
                toastr.fail("{{Session::get('fail')}}")
                </script>
                @endif
                @csrf
                <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
                <input type="hidden" value="Withdraw" name="status" type="text">
                <div class="w3-cell-row">

                    <div class="w3-container w3-cell w3-mobile">


                        <label class="form-label" for="firstname">Date:</label>
                        <input type="text" class="form-control" name="date" id="nepali-datepicker"
                            placeholder="Enter date">
                        <span>
                            @error('date')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>

                        <label class="form-label" for="firstname">Amount:</label>
                        <input type="text" class="form-control" name="income" id="amount"
                            placeholder="Enter your amount">
                        <span>
                            @error('income')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>

                    </div>

                    <div class="w3-container w3-cell w3-mobile">

                        <label class="form-label" for="firstname">Current Month:</label>
                        <input type="text" class="form-control" name="date3" id="amount" value="January 2023" readonly>
                        <span>
                            @error('date3')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>

                        <label class="form-label" for="firstname">Remark:</label>
                        <textarea type="text" class="form-control" name="remark" id="remark"
                            placeholder="Remarks"></textarea>
                        <span>
                            @error('remark')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>
                    </div>
                </div>

                <input type="submit" name="room_saving" value="Withdraw Money" class="btn btn-success mb-3 mx-5">


            </form>





        </div>

    </main>


    <script type="text/javascript">
    $(document).ready(function() {
        var currentDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD");


        $('#nepali-datepicker').nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,

        });
    });
    </script>

</body>


@include("layouts/adminfooter")

</html>