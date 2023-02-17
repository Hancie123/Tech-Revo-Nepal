@include("layouts/adminsidemenu")
@push('title')
<title>Project Management System</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
                                        <select class="w3-input w3-border w3-round" placeholder="Enter project category"
                                            name="category" id="category">
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
                                        <input class="w3-input w3-border w3-round" placeholder="Enter project due date"
                                            name="duedate" type="date">
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
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
                                            role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{$data->progress}}%">
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
                                    <a><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
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