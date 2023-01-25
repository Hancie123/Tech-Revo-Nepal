@include("layouts/adminsidemenu")
@push('title')
<title>Dashboard | Password Management System</title>

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
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Store Passwords</button><br><br>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Model StorePasswords -->
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Password Management System</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <form method="post" action="{{url('/home/passwords')}}">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf

                        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id" type="text">
                        <div class="w3-cell-row">
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>Username/Email</b></label>
                                <input class="w3-input w3-border" name="email" type="text">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>

                            </div>
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>Password</b></label>
                                <input class="w3-input w3-border" name="password" type="text">
                                <span class="text-danger">@error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <br>
                        <div class="w3-cell-row">
                            <div class="w3-container w3-cell w3-mobile">
                                <label class="w3-text"><b>URL/Category</b></label>
                                <input class="w3-input w3-border" name="category" type="url">
                                <span class="text-danger">@error('category')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                        </div><br>
                        <button type="submit" class="btn btn-success">Save</button>
                        <br>

                    </form>

                </div>



            </div>
        </div>
    </div>


    <div class="container">
        <table class="table table-striped">
            <thead class="bg-success text-white">
                <tr class="w3-center">
                    <td>ID</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Category/URL</td>
                </tr>
            </thead>
            <tbody>
                @foreach($password as $data)
                <tr>
                    <td>{{$data['password_id']}}</td>
                    <td>{{$data['email']}}</td>
                    <td>{{$data['password']}}</td>
                    <td><a href="{{$data['url']}}" target="_blank">{{$data['url']}}</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>




@include(" layouts/adminfooter")