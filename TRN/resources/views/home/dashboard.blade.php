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

    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">


                                <div class="card-body">
                                    <h5 class="card-title">Room Balance</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-dollar-circle bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2>{{$roombalance}}</h2>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="card">
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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">TRN Balance</h5>

                                    <div class="d-flex align-items-center">
                                        <div> <i class='bx bx-dollar-circle bx-lg'></i>
                                        </div>
                                        <div class="ps-3">
                                            <h2>{{$trnbalance}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
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
                <div class="card flex-fill w-100">
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


</main>




@include("layouts/adminfooter")