@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | View Notes</title>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>View Notes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/home/notes')}}">Notes</a></li>
                <li class="breadcrumb-item active">View Notes</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->

    <div class="container table-responsive">
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

        <table class="table table-hover table-borderless" id="table_id">
            <thead class="w3-center bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Updated</th>
                    <th style="display:none;">Note</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody class="w3-center">
                @foreach($notes as $note)
                <tr>
                    <td>{{$note['note_id']}}</td>
                    <td>{{$note['title']}}</td>
                    <td>{{$note['updated_at']->diffForHumans()}}</td>
                    <td style="display:none;"> {!!$note->notes!!}</td>
                    <td>
                        <button class="btnEdit btn btn-primary"><i class="bi bi-eye"></i></button>



                        <a href="{{url('/home/notes/view_notes/delete')}}/{{$note->note_id}}">
                            <button class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                        </a>


                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>



    </div>





    <!-- Modal -->
    <div class="modal fade" id="{{ $note->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="$note->slug" method="post">
                        @csrf
                        @foreach($notes as $data)

                        <p>{{$note->slug}}</p>
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modeltitle">TRN Notes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="{{url('/home/notes/view_notes')}}/{{$note->note_id}}" method="post">

                        @if(Session::has('updatesuccess'))
                        <script>
                        toastr.success("{{Session::get('updatesuccess')}}")
                        </script>
                        @endif
                        @if(Session::has('updatefail'))
                        <script>
                        toastr.fail("{{Session::get('updatefail')}}")
                        </script>
                        @endif
                        @csrf
                        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
                        <textarea class="form-control" rows="20" id="txtName" name="note"></textarea>



                    </form>



                </div>
            </div>

        </div>
    </div>
    </div>






</main>

<script>
$(".btnEdit").click(function() {
    debugger;
    var currentTds = $(this).closest("tr").find("td"); // find all td of selected row
    var cell2 = $(currentTds).eq(3).text(); // eq= cell , text = inner text

    $("#txtName").val(cell2);

    $("#exampleModal").modal('show');
});
</script>





<script>
$(document).ready(function() {
    $('#table_id').DataTable({
            order: [
                [0, 'desc']
            ],
        }

    );
});
</script>


@include(" layouts/adminfooter")

</body>

</html>