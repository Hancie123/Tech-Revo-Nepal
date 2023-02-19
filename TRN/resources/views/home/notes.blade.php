@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Notes</title>
<script src="https://cdn.tiny.cloud/1/z6amzuaurphk5l6v49xbiygcnmsuc2yfna63qag71vcnr6lg/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Notes Management System</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Notes</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->


    <form method="post" action="{{url('/home/notes')}}">
        @if(Session::has('notesuccess'))
        <script>
        toastr.success("{{Session::get('notesuccess')}}")
        </script>
        @endif
        @if(Session::has('notefail'))
        <script>
        toastr.fail("{{Session::get('notefail')}}")
        </script>
        @endif
        @csrf
        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
        <label>Title</label>
        <input class="w3-input w3-border" name="title" type="text">
        <span>
            @error('title')
            <script>
            toastr.warning('{{$message}}')
            </script>
            @enderror
        </span> <br>


        <textarea name="note">
     Welcome {{Session::get('name')}}
  </textarea>


        <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
        </script>




        <span>
            @error('note')
            <script>
            toastr.warning('{{$message}}')
            </script>
            @enderror
        </span>
        <br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{route('home.notes.view_notes')}}" class="btn btn-success">View Notes</a>

    </form>


</main>
</body>@include(" layouts/adminfooter")

</html>