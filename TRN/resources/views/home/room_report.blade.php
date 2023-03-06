@include("layouts.adminsidemenu")
@push('title')
<title>Admin Dashboard | Room Reports</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Room Expenses Reports</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Room Reports</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->

    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home">Daily Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#menu1">7 Days Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#menu2">30 Days Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#alltime">All Time Expenses</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-------------------------------- Tab 1 --------------------------------->
            <div id="home" class="container tab-pane active"><br>
                <div class="container">
                    <div class="row">

                        <div class="col-6 col-xxl-6 col-sm-12">
                            <div class="card flex-fill w-100 w3-animate-right">
                                <div class="card-header">

                                    <h5 class="card-title p-0">Room Deposit Detail [<?php echo date('l'); ?>]</h5>
                                </div>
                                <div class="card-body py-3">
                                    <script type="text/javascript">
                                    google.charts.load("current", {
                                        packages: ["corechart"]
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Remarks', 'Deposit'],
                                            <?php echo $dailychart1?>
                                        ]);

                                        var options = {
                                            title: 'Today Deposits',
                                            is3D: true,
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById(
                                            'piechart_3d'));
                                        chart.draw(data, options);
                                    }
                                    </script>
                                    <div id="piechart_3d" style="width: 90%; height: 50vh;"></div>



                                </div>
                            </div>
                        </div>


                        <div class="col-6 col-xxl-6 col-sm-12">

                            <div class="card flex-fill w-100 w3-animate-right">
                                <div class="card-header">

                                    <h5 class="card-title p-0">Room Expenses Detail [<?php echo date('l'); ?>]</h5>
                                </div>
                                <div class="card-body py-3">
                                    <script type="text/javascript">
                                    google.charts.load("current", {
                                        packages: ["corechart"]
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Remarks', 'Deposit'],
                                            <?php echo $dailychart2?>
                                        ]);

                                        var options = {
                                            title: 'Today Expenses',
                                            is3D: true,
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById(
                                            'piechart_3d2'));
                                        chart.draw(data, options);
                                    }
                                    </script>
                                    <div id="piechart_3d2" style="width: 90%; height: 50vh;"></div>



                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-------------------------------------- Tab 2 ------------------------------->
            <div id="menu1" class="container tab-pane fade"><br>

                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Withdraw', 'Deposit'],
                        <?php echo $weeklychart?>
                    ]);

                    var options = {
                        title: 'Room Expenses and Deposit',
                        curveType: 'function',
                        legend: {
                            position: 'bottom'
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
                </script>
                <div id="curve_chart" style="width: 90%; height: 50vh;"></div>


            </div>



            <!-------------------------------- Tab 2 Monthly Data Graph--------------------------------->
            <div id="menu2" class="container tab-pane fade"><br>
                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawVisualization);

                function drawVisualization() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'Withdraw', 'Deposit'],
                        <?php echo $monthchart?>
                    ]);

                    var options = {
                        title: 'Room Expenses and Deposits',
                        vAxis: {
                            title: 'Deposit and Withdraw'
                        },
                        hAxis: {
                            title: 'Months'
                        },
                        seriesType: 'bars',
                        series: {
                            5: {
                                type: 'line'
                            }
                        }
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
                    chart.draw(data, options);
                }
                </script>
                </head>

                <body>
                    <div id="chart_div2" style="width: 90%; height: 50vh;"></div>
            </div>

            <!------------------------- All Time Data Tab ----------------------------->
            <div id="alltime" class="container tab-pane fade"><br>
                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawVisualization);

                function drawVisualization() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'Withdraw', 'Deposit'],
                        <?php echo $chartdata?>
                    ]);

                    var options = {
                        title: 'Room Expenses and Deposits',
                        vAxis: {
                            title: 'Deposit and Withdraw'
                        },
                        hAxis: {
                            title: 'Months'
                        },
                        seriesType: 'bars',
                        series: {
                            5: {
                                type: 'line'
                            }
                        }
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
                </script>
                </head>

                <body>
                    <div id="chart_div" style="width: 90%; height: 50vh;"></div>

            </div>
        </div>
    </div>

</main>
<style>
.tab-content>.tab-pane {
    height: 1px;
    overflow: hidden;
    display: block;
    visibility: hidden;
}

.tab-content>.active {
    height: auto;
    overflow: auto;
    visibility: visible;
}
</style>

@include(" layouts.adminfooter")