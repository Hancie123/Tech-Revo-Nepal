@include("layouts/adminsidemenu")

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
                            <a href="#">Show all notifications</a>
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

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Room Expenses</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Deposit Money</span>
                        </a>

                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Withdraw Money</span>
                        </a>

                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Analytics </span>
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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Passwords Management System</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Passwords</li>
                </ol>
            </nav>

        </div><!-- End Page Title -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Store
            Passwords</button><br><br>

        <!-- The Modal -->
        <div class="modal w3-animate-zoom" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Model StorePasswords -->
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Password Management System</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post" action="{{url('/home/passwords')}}">
                        <!-- Modal body -->
                        <div class="modal-body ">

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
                            <div class="w3-cell-row">
                                <div class="w3-container w3-cell w3-mobile">
                                    <label class="w3-text"><b>Username/Email</b></label>
                                    <input class="w3-input w3-border" name="email" type="text">
                                    <span>
                                        @error('email')
                                        <script>
                                        toastr.warning('{{$message}}')
                                        </script>
                                        @enderror
                                    </span>

                                </div>
                                <div class="w3-container w3-cell w3-mobile">
                                    <label class="w3-text"><b>Password</b></label>
                                    <input class="w3-input w3-border" name="password" type="text">
                                    <span>
                                        @error('password')
                                        <script>
                                        toastr.warning('{{$message}}')
                                        </script>
                                        @enderror
                                    </span>
                                </div>

                            </div>
                            <br>
                            <div class="w3-cell-row">
                                <div class="w3-container w3-cell w3-mobile">
                                    <label class="w3-text"><b>URL/Category</b></label>
                                    <input class="w3-input w3-border" name="category" type="text">
                                    <span>
                                        @error('category')
                                        <script>
                                        toastr.warning('{{$message}}')
                                        </script>
                                        @enderror
                                    </span>
                                </div>

                            </div><br>
                            <input type="submit" class="btn btn-success" value="Save">
                            <br>




                        </div>

                    </form>



                </div>
            </div>
        </div>


        <div class="container table-responsive">
            @if(Session::has('passwordsuccess'))
            <script>
            toastr.success("{{Session::get('passwordsuccess')}}")
            </script>
            @endif
            @if(Session::has('passwordfail'))
            <script>
            toastr.fail("{{Session::get('passwordfail')}}")
            </script>
            @endif
            <table class="table table-striped" id="table_id">
                <thead class="bg-success text-white">
                    <tr class="w3-center">
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Category/URL</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($password as $data)
                    <tr>
                        <td>{{$data['password_id']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>{{$data['password']}}</td>
                        <td><a href="{{$data['url']}}" target="_blank">{{$data['url']}}</a></td>
                        <td>{{$data['created_at']}}</td>
                        <td><a href="{{url('/home/passwords')}}/{{$data->password_id}}" class=" text-danger">
                                <i class=" bi bi-trash"></i>
                            </a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    </script>


    @include(" layouts/adminfooter")