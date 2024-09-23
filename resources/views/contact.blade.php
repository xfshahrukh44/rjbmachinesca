@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
    <section class="inner-banner banner-img">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="gray-back">
                        <div class="border-pad">
                            <h4>{{ $page->page_name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="mfps about-inner-sec pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="main-mfps">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="img-side-mfps">
                                    <h2>Welcome to R.J. Business Machines Ltd.</h2>
                                    <h6>Address: R.J. Business Machines Ltd.</h6>
                                    <p><i class="fa fa-map-marker"></i> {!! App\Http\Traits\HelperTrait::returnFlag(519) !!}</p>
                                    <p> <i class="fa fa-mobile"></i><a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(123) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(123) !!}</a></p>
                                    <p> <i class="fa fa-mobile"></i><a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}</a>
                                    </p>
                                    <p><i class="fa fa-fax"></i><a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}"> {!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}</a></p>
                                    <p><i class="fa-regular fa-envelope"></i> <a href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(1974) !!}">
                                        {!! App\Http\Traits\HelperTrait::returnFlag(1974) !!}</a></p>
                                    {{-- <p> <i class="fa-regular fa-envelope"></i><a href="mailto: rudolph@rjbmachines.com">
                                            rudolph@rjbmachines.com</a></p> --}}
                                    <p><i class="fa-regular fa-envelope"></i><a
                                            href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="side-form">
                        <h3>REQUEST A QUOTE</h3>
                        <form id="contactform">
                            @csrf
                            <input type="hidden" name="form_name" value="Contact Form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="fname" class="form-control" placeholder="Name"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_company" class="form-control" placeholder="Company"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="notes" id="textarea" class="form-control" placeholder="Message" cols="30" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn custom-btn-2">Submit</button>

                                </div>
                                <div class="mt-2" id="contactformsresult"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="frame-locate pt-5">
                        {!! App\Http\Traits\HelperTrait::returnFlag(1966) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
