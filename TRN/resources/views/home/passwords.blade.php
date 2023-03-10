@include("layouts/adminsidemenu")
@push('title')
<title>Admin Dashboard | Passwords</title>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Passwords Management System</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Passwords</li>
            </ol>
        </nav>

    </div><!-- End Page Title -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Store
        Passwords</button><br><br>

    <!-- The Modal -->
    <div class="modal w3-animate-zoom" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Model StorePasswords -->
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Password Management System</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="{{url('/home/passwords')}}">
                    <!-- Modal body -->
                    <div class="modal-body ">

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
                        <div class="w3-cell-row">
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>Username/Email</b></label>
                                <input class="w3-input w3-border w3-round" name="email" type="text">
                                <span>
                                    @error('email')
                                    <script>
                                    toastr.warning('{{$message}}')
                                    </script>
                                    @enderror
                                </span>

                            </div>
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>Password</b></label>
                                <input class="w3-input w3-border w3-round" id="myInput" name="password" type="password">
                                <span>
                                    @error('password')
                                    <script>
                                    toastr.warning('{{$message}}')
                                    </script>
                                    @enderror
                                </span>
                                <input class="w3-left-align" type="checkbox" id="passwordshow720"
                                    onclick="myFunction()"><label for="passwordshow720">Show
                                    Password</label>
                            </div>

                            <script>
                            function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                            </script>

                        </div>
                        <br>
                        <div class="w3-cell-row">
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>URL/Category</b></label>
                                <input class="w3-input w3-border w3-round" name="category" type="text">
                                <span>
                                    @error('category')
                                    <script>
                                    toastr.warning('{{$message}}')
                                    </script>
                                    @enderror
                                </span>
                            </div>

                        </div><br>
                        <input type="submit" class="btn btn-success" value="Save">
                        <br>




                    </div>

                </form>



            </div>
        </div>
    </div>


    <div class="container table-responsive">
        @if(Session::has('passwordsuccess'))
        <script>
        toastr.success("{{Session::get('passwordsuccess')}}")
        </script>
        @endif
        @if(Session::has('passwordfail'))
        <script>
        toastr.fail("{{Session::get('passwordfail')}}")
        </script>
        @endif
        <table class="table table-striped" id="table_id">
            <thead class="bg-success text-white">
                <tr class="w3-center">
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Category/URL</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($password as $data)
                <tr>
                    <td>{{$data['password_id']}}</td>
                    <td>{{$data['email']}}</td>
                    <td>{{$data['password']}}

                    </td>
                    <td><a href="{{$data['url']}}" target="_blank">{{$data['url']}}</a></td>
                    <td>{{$data['created_at']->diffForHumans()}}</td>
                    <td><a href="{{url('/home/passwords')}}/{{$data->password_id}}" class=" text-danger">
                            <i class=" bi bi-trash"></i>
                        </a></td>

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

<script>
document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
}, false);
</script>


@include(" layouts.adminfooter")