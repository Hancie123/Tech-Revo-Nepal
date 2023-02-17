@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Messages</title>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Messages/Inbox</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Messages</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="table-responsive">
        @if(Session::has('messagesuccess'))
        <script>
        toastr.success("{{Session::get('messagesuccess')}}")
        </script>
        @endif
        @if(Session::has('messagefail'))
        <script>
        toastr.fail("{{Session::get('messagefail')}}")
        </script>
        @endif
        <table class="table table-hover" id="table_id">
            <thead class="bg-success text-white">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>


            </thead>

            <tbody>
                @foreach($viewallmessages as $data)
                <tr>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['email']}}</td>
                    <td>{{$data['subject']}}</td>
                    <td>{{$data['message']}}</td>
                    <td><a href="{{url('/home/messages')}}/{{$data['contact_id']}}"><button type="button"
                                class="btn btn-danger">
                                <i class="bi bi-x-octagon-fill"></i>
                            </button></a></td>
                </tr>
                @endforeach



            </tbody>


        </table>

    </div>

</main>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>




@include("layouts/adminfooter")