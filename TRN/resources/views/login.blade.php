@push('title')
    <title>Tech Revo Login System</title>
@include('layouts\header')
<link rel="stylesheet" href={{asset('cssfiles\login.css')}}>

<section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>
                    <p class="w-lg-50">Please enter your email and password!</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 
                                    2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.
                                    004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>


                            <form class="text-center" action="{{url('/')}}\login" method="post">
                                @csrf
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <span class="text-danger">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                                <div class="mb-3"><button class="btn btn-success d-block w-100" type="submit">Login</button></div>
                                <p class="text-muted">Forgot your password?</p>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@include('layouts\footer')