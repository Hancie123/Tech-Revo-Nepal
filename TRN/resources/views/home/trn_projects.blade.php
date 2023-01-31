@include("layouts/adminsidemenu")
@push('title')
<title>Project Management System</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
                        <a href="{{url('/home/trn_finance_system')}}">
                            <i class="bi bi-circle"></i><span>TRN Finance System</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/home/trn_finance_system/deposit_money')}}">
                            <i class="bi bi-circle"></i><span>Deposit Money</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/home/trn_finance_system/withdraw_money')}}">
                            <i class="bi bi-circle"></i><span>Withdraw Money</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>TRN Projects</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{url('/home/trn_projects')}}">
                            <i class="bi bi-circle"></i><span>Project Management System</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Room Expenses Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>TRN Finances Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>Projects Report</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->



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
            <h1>TRN Projects</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <!-- -----------------------Project Conatiner -------------------------------->

        <section class="section dashboard container bg-success px-4 py-3 w3-round">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div class="d-flex justify-content-between align-items-center mb-5 ">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white" style="font-weight:bold">Projects</h3>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#myModal">
                            Create Project
                        </button>
                    </div>
                </div>
            </div>


            <!-- The Modal -->
            <div class="modal w3-animate-zoom" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header bg-success text-light">
                            <h4 class="modal-title">TRN Project | Create a project</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <br>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{url('/home/trn_projects')}}" method="post">
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
                                <div class="row">
                                    <div class="col">
                                        <p><label>Project title:</label>
                                            <input class="w3-input w3-border w3-round" name="title" type="text">
                                            <span>
                                                @error('title')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col">
                                        <p><label>Progress:</label>
                                            <input class="w3-input w3-border w3-round " name="progress" type="text">
                                            <span>
                                                @error('progress')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <p><label>Project Status:</label>
                                            <select class="w3-input w3-border w3-round" name="status" id="status">
                                                <option></option>
                                                <option>Completed</option>
                                                <option>Pending</option>
                                                <option>In Progress</option>
                                            </select>
                                            <span>
                                                @error('status')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col">
                                        <p><label>Project Priority:</label>
                                            <select class="w3-input w3-border w3-round" name="priority" id="status">
                                                <option></option>
                                                <option>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>

                                            </select>
                                            <span>
                                                @error('priority')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <p><label>Project Budget:</label>
                                            <input class="w3-input w3-border w3-round" name="budget" type="text">

                                        </p>
                                    </div>

                                    <div class="col">
                                        <p><label>Given By:</label>
                                            <input class="w3-input w3-border w3-round " name="given" type="text">
                                            <span>
                                                @error('given')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p><label>Category:</label>
                                            <select class="w3-input w3-border w3-round"
                                                placeholder="Enter project category" name="category" id="category">
                                                <option></option>
                                                <option>Web Application</option>
                                                <option>Desktop Application</option>
                                                <option>Android Application</option>
                                                <option>Website Design</option>
                                                <option>iOS Application</option>
                                                <option>Graphic Design</option>

                                            </select>
                                            <span>
                                                @error('category')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col">
                                        <p><label>Due date:</label>
                                            <input class="w3-input w3-border w3-round"
                                                placeholder="Enter project due date" name="duedate" type="date">
                                            <span>
                                                @error('duedate')
                                                <script>
                                                toastr.warning('{{$message}}')
                                                </script>
                                                @enderror
                                            </span>
                                        </p>
                                    </div>
                                </div>






                                <input type="submit" class="btn btn-success" value="Submit">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>


                            </form>
                        </div>



                    </div>
                </div>
            </div>
            <!-- -------------------End of Model --------------------------->




            <!-- ---------------------Total Number Carousal ---------------------------->
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Total Projects -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Projects</h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-kanban"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$countproject}}</h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Total Projects -->


                            <!-- Complete Projects -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Complete Projects</h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-kanban"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$completeproject}}</h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- End Complete Projects -->

                            <!-- Active Projects -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Active Projects</h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-kanban"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$activeproject}}</h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Active Projects -->

                        </div>
                    </div>



                    <div class="carousel-item">
                        <div class="row">
                            <!-- Total Projects -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pending Projects</h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-kanban"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$pendingproject}}</h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Total Projects -->

                        </div>
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>


            </div>
            <!-- ---------------------End Total Number Carousal ---------------------------->
        </section>
        <!------------------------- Container Section Close --------------------------------->

        <br>
        <!-- Content Row -->

        <div class="row">

            <!--------------- Project Table ------------------------->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header--->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Projects Data</h6>
                    </div>
                    <br>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table" id="table_id720">
                            <thead class="bg-success text-light">
                                <tr>

                                    <th>Project Name</th>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th style="width:20%">Actions</th>


                                </tr>
                            </thead>

                            <tbody>
                                @foreach($table as $data)
                                <tr>

                                    <td>{{$data->title}}</td>
                                    <td>{{$data->category}}</td>
                                    <td>{{$data->budget}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success bg-success text-light progress-bar-striped active"
                                                role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                                aria-valuemax="100" style="width:{{$data->progress}}%">
                                                {{$data->progress}}%
                                            </div>

                                        </div>
                                    </td>
                                    <td>@if($data->status=='In Progress')
                                        <span class="badge bg-primary">In Progress</span>
                                        @elseif($data->status=='Completed')
                                        <span class="badge bg-success">Completed</span>
                                        @else
                                        <span class="badge bg-warning">Pending</span>
                                        @endif

                                    </td>


                                    <td>@if($data->priority=='High')
                                        <span class="badge bg-success">High</span>
                                        @elseif($data->priority=='Medium')
                                        <span class="badge bg-warning">Medium</span>
                                        @else
                                        <span class="badge bg-danger">Low</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a><button class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"></i></button></a>
                                        <a href="{{url('/home/trn_projects/delete')}}/{{$data->project_id}}"><button
                                                class="btn btn-danger"><i class="bi bi-trash3"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Project Report</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Category', 'ID'],
                                <?php echo $chartdata?>
                            ]);

                            var options = {
                                title: 'Budget Report'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                        </script>



                        <div id="piechart" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>



        <style>
        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%236c757d' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%236c757d' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon,
        .carousel-control-prev-icon {
            width: 24px;
            height: 24px;
        }
        </style>




    </main>

    <script>
    $(document).ready(function() {
        $('#table_id720').DataTable({
                order: [
                    [1, 'desc']
                ],
            }

        );
    });
    </script>







    @include("layouts/adminfooter")