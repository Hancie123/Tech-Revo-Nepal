@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if($announce==1)
    <!--------------------- The Announcement Modal -------------------->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Announcements</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @foreach($announceall as $data)
                    <p class="w3-center p-0 m-0">{{$data->title}}</p>
                    <hr class="solid">
                    <style>
                    hr {
                        display: block;
                        margin-top: 0.5em;
                        margin-bottom: 0.5em;
                        margin-left: auto;
                        margin-right: auto;
                        border-style: inset;
                        border-width: 1px;
                    }
                    </style>
                    <p class="p-2 m-2">{{$data->announcement}}</p><br>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p class="text-start">Posted: {{$data['created_at']->todatestring()}}</p>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
                @endforeach

            </div>
        </div>
    </div>
    @else
    @endif


    <script type="text/javascript">
    window.onload = function() {
        OpenBootstrapPopup();
    };

    function OpenBootstrapPopup() {
        $("#myModal").modal('show');
    }
    </script>




    <!------------------------------ Balance system container -------------------------->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card w3-animate-left">


                                <div class="card-body">
                                    <h5 class="card-title">Room Balance</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-dollar-circle bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2><?php echo number_format($roombalance); ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="card w3-animate-left">
                                <div class="card-body">
                                    <h5 class="card-title">Total Projects</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-stats bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2>{{$project}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="card w3-animate-right">
                                <div class="card-body">
                                    <h5 class="card-title">TRN Balance</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-dollar-circle bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2><?php echo number_format($trnbalance); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card w3-animate-right">
                                <div class="card-body">
                                    <h5 class="card-title">Total Notes</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-note bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2>{{$notes}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">

                <div class="card flex-fill w-100 w3-animate-right">
                    <div class="card-header">

                        <h5 class="card-title p-0">Room Expenses Detail</h5>
                    </div>
                    <div class="card-body py-3">





                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Category', 'Withdraw', 'Deposit'],
                                <?php echo $chartdata?>
                            ]);

                            var options = {
                                title: 'Room Finance',
                                curveType: 'function',
                                legend: {
                                    position: 'bottom'
                                }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                        </script>


                        <div class="w3-container" id="curve_chart" style="width: 100%; height: 34vh;"></div>



                    </div>
                </div>
            </div>
        </div>


    </div>














    <div class="container">
        <div class="row w3-animate-top">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">Detailed Reports</p>
                                                <h1 class="text-primary">NPR.
                                                    <?php echo number_format($projectbudget,2); ?>
                                                </h1>
                                                <h3 class="font-weight-500 mb-xl-4 text-primary">Projects Budget
                                                </h3>
                                                <p class="mb-2 mb-xl-0">It is the total project budget that is done
                                                    by Tech
                                                    Revo Nepal.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-9">
                                            <div class="row">
                                                <div class="col-md-6 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-4">
                                                        <table class="table table-borderless report-table">
                                                            @foreach($allproject as $data)
                                                            <tr>
                                                                <td class="text-muted" style="width:50%">
                                                                    {{$data->title}}
                                                                </td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                            role="progressbar"
                                                                            style="width:{{$data->progress}}%"
                                                                            aria-valuenow="70" aria-valuemin="0"
                                                                            aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>


                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">


                                                    <!-- Card Header - Dropdown -->
                                                    <div
                                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                        <h6 class="m-0 font-weight-bold text-primary">Project Report
                                                        </h6>
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
                                                                <?php echo $projectchart?>
                                                            ]);

                                                            var options = {
                                                                title: 'Budget Report'
                                                            };

                                                            var chart = new google.visualization.PieChart(document
                                                                .getElementById('piechart'));

                                                            chart.draw(data, options);
                                                        }
                                                        </script>



                                                        <div id="piechart" style="width: 100%; height: 100%;"></div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>








</main>




@include("layouts/adminfooter")