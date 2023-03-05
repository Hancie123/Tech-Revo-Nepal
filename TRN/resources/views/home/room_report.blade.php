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

                <div class="row">
                    <div class="col-6 col-xxl-6 col-sm-12">

                        <div class="card flex-fill w-100 w3-animate-right">
                            <div class="card-header">

                                <h5 class="card-title p-0">Room Deposit Detail</h5>
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

                                <h5 class="card-title p-0">Room Expenses Detail</h5>
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
                                        title: 'My Daily Activities',
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


            <div id="menu1" class="container tab-pane fade"><br>
                <h3>Menu 1</h3>
                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses', 'Profit'],
                        ['2014', 1000, 400, 200],
                        ['2015', 1170, 460, 250],
                        ['2016', 660, 1120, 300],
                        ['2017', 1030, 540, 350]
                    ]);

                    var options = {
                        chart: {
                            title: 'Company Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
                </script>

                <div id="columnchart_material" style="width: 1200px; height: 500px;"></div>
            </div>



            <!-------------------------------- Tab 2 --------------------------------->
            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam.</p>
            </div>

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