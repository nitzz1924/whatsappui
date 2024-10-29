{{-- #---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------” --}}
@extends('auth.UserPanel.Layouts.main')
@section('main-section')
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden rounded-5">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-4  h-100">
                                    <div class="p-3 rounded-5 m-3 border-0 card auth-one-bg">
                                        <div class="p-3 mt-3">
                                            <h1 class="text-white fs-1">Simplify WhatsApp Marketing With YUVMEDIA</h1>
                                            <p class="text-white">Reach your audience instantly and effectively with targeted WhatsApp campaigns by YUVMEDIA.</p>
                                        </div>
                                        <hr class="text-white">
                                        <div class="p-3 m-3">
                                            <img class="img-fluid" src="{{ asset('assets/images/chatting.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6 align-content-center">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h2 class="text-center fw-bold" style="color: #116464">Welcome Back !</h2>
                                        <p class="text-muted text-center">Sign in to continue</p>
                                    </div>
                                    @if ($mymess = Session::get('success'))
                                        <div class="alert border-0 alert-success text-center" role="alert"
                                            id="successAlert">
                                            <strong>{{ $mymess }}</strong>
                                        </div>
                                    @endif
                                    @if ($mymess = Session::get('error'))
                                        <div class="alert border-0 alert-danger text-center" role="alert"
                                            id="dangerAlert">
                                            <strong>{{ $mymess }}</strong>
                                        </div>
                                    @endif
                                    <div class="mt-4">
                                        <form action="{{ route('signup_user_otp') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="username" class="form-label fs-5">Phone Number</label>
                                                <input type="text" name="mobilenumber" class="form-control rounded-5 p-3"
                                                    id="username" placeholder="Enter Phone Number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label fs-5">Password</label>
                                                <input type="password" name="password" class="form-control rounded-5 p-3"
                                                    id="username" placeholder="Enter Your Password" required>
                                            </div>
                                            <div id="alertdiv">

                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Remember
                                                    me</label>
                                            </div>
                                            <div class="mt-4">
                                                <button style="background-color: #116464"
                                                    class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Sign
                                                    In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="#"
                                                class="fw-semibold text-decoration-underline" style="color: #116464">
                                                Signup</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 2000);

        setTimeout(function() {
            $('#dangerAlert').fadeOut('slow');
        }, 2000);
    </script>
@endsection
