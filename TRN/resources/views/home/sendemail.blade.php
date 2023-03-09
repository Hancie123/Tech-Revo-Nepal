@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Send Emails</title>
<script src="https://cdn.tiny.cloud/1/z6amzuaurphk5l6v49xbiygcnmsuc2yfna63qag71vcnr6lg/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Send Emails</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Send Emails</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <h3 class="text-center">Send Email to Anyone</h3>
        <form action="{{url('/home/dashboard/sendemails')}}" method="POST">
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

            <label>To</label>
            <input class="w3-input w3-border w3-round" type="text" name="email" placeholder="Recipient email address">
            <span class="text-danger">
                @error('email')
                {{$message}}

                @enderror
            </span>

            <br>
            <label>Subject</label>
            <input class="w3-input w3-border w3-round" type="text" name="subject" placeholder="Subject">
            <span class="text-danger">
                @error('subject')
                {{$message}}

                @enderror
            </span>

            <br>
            <textarea name="emailmessage"></textarea>
            <span class="text-danger">
                @error('emailmessage')
                {{$message}}

                @enderror
            </span>


            <br>
            <input type="submit" name="room_saving" value="Send Email" class="btn btn-success">



        </form>



    </div>



</main>


<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
});
</script>


@include("layouts.adminfooter")