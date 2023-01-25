<!DOCTYPE html>
<html>

<head>
    @push('title')
    <title>Admin Dashboard | View Notes</title>
    @include("layouts/adminsidemenu")

</head>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>View Notes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">View Notes</li>
                </ol>
            </nav>

        </div><!-- End Page Title -->

        <div class="container table-responsive">
            <table class="table table-hover table-borderless">
                <thead class="w3-center bg-success text-white">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="w3-center">
                    @foreach($notes as $note)
                    <tr>
                        <td>{{$note['note_id']}}</td>
                        <td>{{$note['title']}}</td>
                        <td>
                            <a><button type="button" class="btn btn-primary" id="show-user" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="bi bi-eye"></i>
                                </button></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- The Modal -->
        <div class="modal w3-animate-zoom" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->

                    <div class="modal-body">

                        <p><strong>Name:</strong> <span id="user-name"></span></p>
                    </div>



                </div>
            </div>
        </div>





    </main>



</body>


@include(" layouts/adminfooter")

</html>