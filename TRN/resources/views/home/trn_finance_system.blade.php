@include("layouts/adminsidemenu")
@push('title')
<title>TRN Finance System</title>
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
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Deposit Money</span>
                        </a>
                    </li>

                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Withdraw Money</span>
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
            <h1>TRN Finance System</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">TRN Finance System</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">



                                <div class="card-body">
                                    <h5 class="card-title">Current Balance</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            Rs
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$balance}}</h6>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Deposit</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            Rs
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$deposit}}</h6>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Expenses</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center text-danger">
                                            Rs
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$withdraw}}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Customers Card -->



                        <!------------------------- Second row card ----------------------------------->



                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Tools</h6>
                                        </li>

                                        <li><a class="dropdown-item"
                                                href="{{url('home/room_management/deposit_money')}}">Open</a></li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Deposit Money</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{url('home/trn_finance_system/deposit_money')}}"
                                                class="h5 font-weight-bold">Deposit Money</a>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Withdraw Money Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Tools</h6>
                                        </li>

                                        <li><a class="dropdown-item"
                                                href="{{url('/home/room_management/withdraw_money')}}">Open</a></li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Withdraw Money</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{url('/home/room_management/withdraw_money')}}"
                                                class="h5 font-weight-bold">Withdraw Money</a>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Withdraw Money Card -->

                        <!-- Money Statement Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Tools</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Open</a></li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">View Statements</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-activity"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="#" class="h5 font-weight-bold">View Statements</a>


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Money Statement Card -->





                        <!-- Deposit Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Deposit Reports</h5>

                                    <div class="container table-responsive">
                                        <table class="table table-hover table-striped" id="table_id">
                                            <thead class="w3-center bg-success text-white">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Deposit</th>
                                                    <th>Remark</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach($deposittable as $data)

                                                <tr>
                                                    <td>{{$data['Expenses_ID']}}</td>
                                                    <td>{{$data['Date']}}</td>
                                                    <td>Rs. {{$data['Deposit']}}</td>
                                                    <td>{{$data['Remark']}}</td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>



                                    </div>






                                </div>

                            </div>
                        </div><!-- End Reports -->


                        <!-- Winthdraw Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Withdraw Reports</h5>
                                    <div class="container table-responsive">
                                        <table class="table table-hover table-striped" id="table_id720">
                                            <thead class="w3-center bg-success text-white">
                                                <tr>
                                                    <th style="width:10%">ID</th>
                                                    <th style="width:10%">Date</th>
                                                    <th style="width:10%">Deposit</th>
                                                    <th style="width:10%">Remarks</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach($withdrawtable as $data1)

                                                <tr>
                                                    <td>{{$data1['Expenses_ID']}}</td>
                                                    <td>{{$data1['Date']}}</td>
                                                    <td>Rs. {{$data1['Withdraw']}}</td>
                                                    <td>{{$data1['Remark']}}</td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Reports -->





                    </div>
                </div><!-- End Left side columns -->




                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Recent Activity</h5>

                            <div class="activity">
                                @foreach($room as $data)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{$data['Status' ]}}</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        {{$data['Remark']}}<br><a href="#">Rs.
                                            {{$data['Deposit']}}{{$data['Withdraw']}}</a><br>
                                        {{$data['created_at']->diffForHumans()}}
                                    </div>
                                </div><!-- End activity item-->
                                @endforeach


                            </div>

                        </div>
                    </div><!-- End Recent Activity -->

                    <!-- Budget Report -->
                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Budget Report</h5>

                            <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                    ['Task', 'Hours per Day'],
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
                    </div><!-- End Budget Report -->





                </div><!-- End Right side columns -->

            </div>
        </section>


        <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                order: [
                    [1, 'desc']
                ],
            });
        });
        </script>


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


    </main>

    <script>
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
    }, false);
    </script>






</body>

@include("layouts/adminfooter")

</html>