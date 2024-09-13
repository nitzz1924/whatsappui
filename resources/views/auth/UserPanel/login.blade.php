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
                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Quos a vel laboriosam explicabo quis, non animi corrupti vitae? Delectus,
                                            exercitationem.</p>
                                    </div>
                                    <hr class="text-white">
                                    <div class="p-3 m-3">
                                        <img class="img-fluid" src="{{asset('assets/images/chatting.png')}}" alt="">
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
                                <div class="mt-4">
                                    <form id="signinform">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label fs-5">Phone Number</label>
                                            <input type="text" name="phonenumber" class="form-control rounded-5 p-3"
                                                id="username" placeholder="Enter Phone Number" required>
                                        </div>
                                        <div id="alertdiv">

                                        </div>
                                        <div class="mb-3">
                                            {{-- <div class="float-end">
                                                <a href="auth-pass-reset-cover.html" class="text-muted">Forgot
                                                    password?</a>
                                            </div> --}}
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
                                <div class="p-lg-5 p-4" style="display: none;" id="otpform">
                                    <form autocomplete="off" action="{{ route('verifyotp') }}" method="POST">
                                        @csrf
                                        <div class="text-muted text-center mx-lg-3">
                                            <h4 class="fw-bold" style="color: #116464">Verify OTP</h4>
                                            <p id="phonetxttest"></p>
                                        </div>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit1-input" class="visually-hidden">Digit
                                                            1</label>
                                                        <input type="text" maxlength="1" required name="otptest1"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit1-input">
                                                        <input type="hidden" name="otpid" value="" id="otpid">
                                                        <input type="hidden" name="phonenumber" value="" id="phonenumberid">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit2-input" class="visually-hidden">Digit
                                                            2</label>
                                                        <input type="text" maxlength="1" required name="otptest2"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit2-input">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit3-input" class="visually-hidden">Digit
                                                            3</label>
                                                        <input type="text" maxlength="1" required name="otptest3"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit3-input">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Digit
                                                            4</label>
                                                        <input type="text" maxlength="1" required name="otptest4"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit4-input">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Digit
                                                            5</label>
                                                        <input type="text" maxlength="1" required name="otptest5"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit4-input">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Digit
                                                            6</label>
                                                        <input type="text" maxlength="1" required name="otptest6"
                                                            class="form-control bg-light border-light text-center"
                                                             maxLength="1"
                                                            id="digit4-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button style="background-color: #116464"
                                                    class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Verify
                                                    OTP</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-5 text-center">
                                    <p class="mb-0">Don't have an account ? <a href="auth-signup-cover.html"
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
    $(document).ready(function() {
        $('#signinform').submit(function(e) {
            e.preventDefault();
            console.log("hello");
            $.ajax({
                url: "{{ url('signup_user_otp') }}",
                data: $('#signinform').serialize(),
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    if (data.msg == 'success') {
                        $('#signinform').hide();
                        $('#otpform').show();
                        $('#phonetxttest').html(
                            `Please enter the 6 digit code sent to <span class="fw-semibold">example@abc.com</span>`
                        );
                        $('#otpid').val(data.data.id);
                        $('#phonenumberid').val(data.data.mobilenumber);
                    } else {
                        $('#alertdiv').append('<p id="failuretxt" class="fs-6 rounded-5 text-danger alert alert-danger al text-center">User is not Registered</p>');
                         setTimeout(function() {
                            $('#alertdiv').fadeOut('slow',function(){
                                $($this).remove();
                            })
                        }, 3000);
                    }
                },
            });
        });
});
</script>
@endsection
