@include("layouts/adminsidemenu")
@push('title')
<title>TRN Finance System</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



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
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Tools</h6>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="{{url('home/trn_finance_system/deposit_money')}}">Open</a></li>

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
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Tools</h6>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="{{url('/home/trn_finance_system/withdraw_money')}}">Open</a></li>

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
                                        <a href="{{url('/home/trn_finance_system/withdraw_money')}}"
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
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                                                <td>{{$data['TRN_ID']}}</td>
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
                                                <td>{{$data1['TRN_ID']}}</td>
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