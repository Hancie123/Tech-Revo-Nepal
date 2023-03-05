@push('title')
<title>Tech Revo Login System</title>
@include('layouts.header')
<link rel="stylesheet" href={{asset('cssfiles\login.css')}}>

<section class="position-relative py-4 py-xl-5 w3-animate-top">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>TRN Login System</h2>
                <p class="w-lg-50">Please enter your email and password!</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                viewBox="0 0 16 16" class="bi bi-person">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 
                                    2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.
                                    004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                </path>
                            </svg></div>


                        <form class="text-center" action="{{url('/')}}\login" method="post">
                            @if(Session::has('success'))
                            <div class="alert  alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert  alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf


                            <div class="mb-3 w3-animate-left">
                                <div class="input-field">
                                    <input type="text" name="email" value="{{old('email')}}" required
                                        spellcheck="false">
                                    <label>Enter email</label>
                                </div>
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3 w3-animate-right">
                                <div class="input-field">
                                    <input type="password" id="myInput" name="password" required spellcheck="false">
                                    <label>Enter password</label>
                                </div>
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                                <p type="hidden" id="text">Caps lock is ON.</p>
                                <style>
                                #text {
                                    display: none;
                                    color: red
                                }
                                </style>


                            </div>


                            <div class="mb-3"><button class="btn btn-success d-block w-100" type="submit">Login</button>
                            </div>


                        </form>

                        <script>
                        var input = document.getElementById("myInput");
                        var text = document.getElementById("text");
                        input.addEventListener("keyup", function(event) {

                            if (event.getModifierState("CapsLock")) {
                                text.style.display = "block";
                            } else {
                                text.style.display = "none"
                            }
                        });
                        </script>



                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                            Forgot Password
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content w3-center">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Forgot Password</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="post">
                                            @csrf


                                            <input type=" text" class="w3-input w3-border" name="email"
                                                value="{{old('email')}}" required spellcheck="false"
                                                placeholder="Enter your email">


                                            <br>
                                            <button class="btn btn-success">Reset Password</button>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <a href="/registration">No account? Register here!</a>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
}, false);
</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');



.input-field {
    position: relative;
}

.input-field input {
    width: 22em;
    height: 2.5em;
    border-radius: 6px;
    font-size: 16px;
    padding: 0 15px;
    border: 2px solid rgb(6, 76, 26);
    background: transparent;
    color: black;
    outline: none;
}

.input-field label {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: rgb(10, 8, 8);
    font-size: 16px;
    pointer-events: none;
    transition: 0.3s;
}

input:focus {
    border: 2px solid rgb(6, 76, 26);
}

input:focus~label,
input:valid~label {
    top: 0;
    left: 15px;
    font-size: 16px;
    padding: 0 2px;
    background: white;
}
</style>


@include('layouts.footer')