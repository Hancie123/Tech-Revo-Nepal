<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @stack('title')
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('icons\apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons\android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons\android-chrome-512x512.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('/')}}/adminassets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/adminassets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{url('/')}}/adminassets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- Template Main CSS File -->
    <link href="{{url('/')}}/adminassets/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>


</head>


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
                            <a href="{{url('/home/messages')}}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
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
                            <a href="{{url('/home/messages')}}">
                                Show all notifications
                            </a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-target="#demo" data-bs-toggle="offcanvas">
                        <i class="bi bi-chat-dots"></i>
                        <!-- <span class="badge bg-primary badge-number">NEW</span> -->
                    </a>



                    <link rel="stylesheet"
                        href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
                    <style>
                    .w3-lobster {
                        font-family: "Lobster", Sans-serif;
                    }


                    #message720 {
                        background-color: rgb(235, 235, 235);
                    }
                    </style>
                    <div class="offcanvas offcanvas-end " id="demo">
                        <div class="offcanvas-header">
                            <h3 class="w3-center w3-lobster">Welcome {{Session::get('name')}}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="container border p-3 overflow-auto" style="height:70vh;">

                                @foreach($viewchat as $data)

                                @php
                                $i = Session::get('admin_id');

                                @endphp
                                @if($data->User_ID ==$i)
                                <div class="p-2 w3-right-align">
                                    <label alt="Profile" class="w3-circle bg-success py-2 px-2 text-white h5">
                                        <?php $name=$data->name; echo substr("$name",0,2);?>
                                    </label>

                                    <label class="p-2 w3-round" id="message720">{{$data->message}}</label><br>
                                    <label>{{$data['created_at']->diffForHumans()}}</label>

                                </div><br>

                                @else

                                <div class="p-2 w3-left-align">
                                    <label alt="Profile" class="w3-circle bg-success py-2 px-2 text-white h5">
                                        <?php $name=$data->name; echo substr("$name",0,2);?>
                                    </label>

                                    <label class="p-2 w3-round" id="message720">{{$data->message}}</label><br>
                                    <label>{{$data['created_at']->diffForHumans()}}</label>

                                </div><br>

                                @endif

                                @endforeach

                            </div>


                            <form action="{{url('/home/dashboard')}}" method="post">

                                @csrf
                                <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
                                <input type="hidden" value="{{Session::get('name')}}" name="name" type="text">
                                <div class="input-group w3-display-bottommiddle p-4">




                                    <textarea type="text" class="form-control" id="comment" name="message"></textarea>
                                    <button id="submitchat" class="btn btn-success" type="submit">Send</button>

                                    <script>
                                    var input = document.getElementById("comment");
                                    input.addEventListener("keypress", function(event) {
                                        if (event.key === "Enter") {
                                            event.preventDefault();
                                            document.getElementById("submitchat").click();
                                        }
                                    });
                                    </script>

                                </div>
                                <span>
                                    @error('message')
                                    <script>
                                    toastr.warning('{{$message}}')
                                    </script>
                                    @enderror
                                </span>

                            </form>




                        </div>



                    </div>

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
                            <a class="dropdown-item d-flex align-items-center btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#insertannouncement">
                                <i class="bi bi-megaphone"></i>
                                <span>Announcements</span>
                            </a>
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#aboutmodel">
                                <i class="bi bi-people"></i>
                                <span>About Us</span>
                            </a>
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


    @if($announce==1)
    <!-- The Anouncmenet Modal -->
    <div class="modal" id="insertannouncement">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Active Announcement</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{url('/home/dashboard/insertannouncement')}}" method="post">
                        @if(Session::has('announcesuccess'))
                        <script>
                        toastr.success("{{Session::get('announcesuccess')}}")
                        </script>
                        @endif
                        @if(Session::has('announcefail'))
                        <script>
                        toastr.fail("{{Session::get('announcefail')}}")
                        </script>
                        @endif
                        @csrf

                        <div class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-amber">
                            <p>To make a new announcement, you should first remove the existing one.</p>
                        </div>



                        <table class="table table-borderless">
                            <tr class="3-centerw border">
                                <th>Title</th>
                                <th>Announcement</th>
                                <th>Action</th>
                            </tr>
                            @foreach($announceall as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->announcement}}</td>
                                <td><a href="{{url('/home/dashboard/deleteannouncement')}}/{{$data->announce_id}}">
                                        <i class='bx bx-trash bx-md'></i>
                                    </a></td>
                            </tr>
                            @endforeach
                        </table>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @else
    <!-- The Anouncmenet Modal -->
    <div class="modal" id="insertannouncement">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Announcements</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{url('/home/dashboard/insertannouncement')}}" method="post">
                        @if(Session::has('announcesuccess'))
                        <script>
                        toastr.success("{{Session::get('announcesuccess')}}")
                        </script>
                        @endif
                        @if(Session::has('announcefail'))
                        <script>
                        toastr.fail("{{Session::get('failannouncefail')}}")
                        </script>
                        @endif
                        @csrf
                        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">

                        <label class="w3-text"><b>Announcement Title</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="announcementtitle">
                        <span>
                            @error('announcementtitle')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>

                        <label class="w3-text"><b>Message</b></label>
                        <textarea class="w3-input w3-border w3-round" rows="5" type="text"
                            name="announcement"></textarea>
                        <span>
                            @error('announcement')
                            <script>
                            toastr.warning('{{$message}}')
                            </script>
                            @enderror
                        </span>
                        <br>
                        <button tyle="submit" class="w3-btn bg-primary w3-round text-white">Announce</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @endif



    <!----------------------- About Us Model ----------------------->
    <div class="modal" id="aboutmodel">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title w3-centerr">Tech Revo Nepal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>Tech Revo is an IT company based in Nepal that was founded in 2022. They
                        specialize in creating a
                        wide range of applications such as android, desktop and web applications. They
                        have a team of
                        experienced professionals led by CEO Hancie Phago, that provides a wide range of
                        services to
                        their
                        clients. These services include web development, android development, graphic
                        design, desktop
                        application development, iOS application development and website design.</p>
                    <br>
                    <p>Developers:</p>
                    <ul>
                        <li>Hancie Phago</li>
                        <li>Nitesh Hamal</li>
                        <li>Aveshesh KC</li>
                        <li>Ajaya Timsina</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!----------------------- End About Us Model ----------------------->

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

                    <li>
                        <a href="{{route('home.dashboard.sendemails')}}">
                            <i class="bi bi-circle"></i><span>Send Emails</span>
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
                        <a href="{{url('/home/room_reports')}}">
                            <i class="bi bi-circle"></i><span>Room Expenses Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>TRN Finances Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                    <span>Logout</span>
                </a>
            </li><!-- End Login Page Nav -->





        </ul>



    </aside><!-- End Sidebar-->