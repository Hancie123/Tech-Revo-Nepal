@push('title')
<title>Tech Revo System | Create an Account</title>
@include('layouts\header')


<div class="container">
    <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
        <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7" style="border-radius: 5px;">
            <div class="p-5">
                <div class="text-center">
                    <h2 class="text-dark mb-4">
                        <bold>Create an Account!</bold>
                    </h2>
                </div>
                <form action="{{url('/')}}\registration" class="user" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3"><input class="form-control form-control-user" name=name type="text"
                            placeholder="Name">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3"><input class="form-control form-control-user" name=email type="email" id="email"
                            placeholder="Email Address">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" name=date
                                type="date" id="password" placeholder="Date of Birth">
                            <span class="text-danger">
                                @error('date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="col-sm-6"><input class="form-control form-control-user" name=mobile type="mobile"
                                placeholder="Mobile number">
                            <span class="text-danger">
                                @error('mobile')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" name=address
                                type="text" placeholder="Address"><span class="text-danger">
                                @error('address')
                                {{$message}}
                                @enderror
                            </span></div>

                        <div class="col-sm-6"><input class="form-control form-control-user" name=password
                                type="password" placeholder="Password"><span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                            </span></div>

                    </div>
                    <div class="row mb-3">
                        <p id="emailErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                        <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                    </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" type="submit">Register
                        Account</button>
                    <hr>
                </form>
                <!-- <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div> -->
                <div class="text-center"><a class="small" href="/login">Already have an account? Login!</a></div>
            </div>
        </div>
    </div>
</div>



@include('layouts\footer')