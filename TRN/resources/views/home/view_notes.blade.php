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



    <div class="w3-row w3-border">

        <div class="w3-third  w3-container ">

            <div class="container py-3 my-3 table-responsive overflow-auto" style="max-height: 70vh">
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

                <table class="table table-hover table-bordered border" id="table_id">
                    <thead class="w3-center bg-success text-white">
                        <tr>

                            <th>Notes</th>

                            <th style="display:none;">Note</th>

                        </tr>
                    </thead>

                    <tbody class="w3-center">
                        @foreach($notes as $note)
                        <tr>

                            <td class="btnEdit p-3">{{$note['title']}}<br>
                                <!-- <a href="{{url('/home/notes/view_notes/delete')}}/{{$note->note_id}}">
                                    <button class="btn btn-danger"><i class="bi bi-x-circle-fill"></i></button>
                                </a> -->
                            </td>

                            <td style="display:none;"> {!!$note->notes!!}</td>


                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>




        </div>
        <div class="w3-twothird w3-container">

            <textarea class="w3-input w3-animate-input w3-border w3-round py-3 my-3" rows="21" id="txtName" name="note"
                readonly></textarea>
        </div>
    </div>


































</main>




<script>
$(".btnEdit").click(function() {
    debugger;
    var currentTds = $(this).closest("tr").find("td"); // find all td of selected row
    var cell2 = $(currentTds).eq(1).text(); // eq= cell , text = inner text

    $("#txtName").val(cell2);

    $("#exampleModal").modal('show');
});
</script>





<!-- <script>
$(document).ready(function() {
    $('#table_id').DataTable({
            order: [
                [0, 'desc']
            ],
        }

    );
});
</script> -->


@include(" layouts/adminfooter")

</body>

</html>