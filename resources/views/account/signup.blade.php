@extends('layouts.main')
@section('content')
    <section class="inner-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="gray-back">
                        <div class="border-pad">
                            <h4>SIGNUP</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="top-prog-sec top-prog-sec2 contact-sec">
        <section class="inpage featurePro">
            <div class="container">
                <div class="row">


                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="account_form">
                            <div class="form_head  mb-4">
                                <h3> Register </h3>
                                <p> If you have a registered account, you can login below. </p>
                            </div>
                            <form class="loginForm" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group mb-2">
                                            <input type="text"
                                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" placeholder="Full name" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group mb-2">
                                            <input type="text"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" placeholder="Email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group mb-2">

                                            <!--  <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>-->

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group mb-2">
                                            <input type="password"
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" placeholder="Password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group mb-2">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row logRow">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <div class="log submit-btn">
                                            <!--<a href="javascript:void(0)" class="btn btn1"> Register </a> --> <input
                                                type="submit" class="log submit-btn" value="Register" /> </div>

                                    </div>

                                </div>

                                <hr />


                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="customer">
                                            <h5> Already have an account?</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
                                        <div class="request"> <a href="{{ route('signin') }}" class="btn btn1 "> Login </a>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>

        <!-- END: Checkout Section -->
    </div>
    <!-- product page end-->
@endsection
@section('css')
    <style type="text/css">
        .account_form {
            margin: 70px 0px;
        }

        input.log.submit-btn {
            color: #fff;
            background: #710303;
            border: 1px solid #710303;
            width: 100%;
            padding: 10px;
        }

        a.btn.btn1 {
            color: #fff;
            background: #710303;
            border: 1px solid #710303;
            width: 100%;
            padding: 10px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', ".btn1", function(e) {
            $('.loginForm').submit();
        });
    </script>
@endsection
