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



    <section class="mfps kyocera-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-mfps">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="img-side-mfps">
                                    @foreach ($Kyoceraaward as $value)
                                        <div class="bli-img">
                                            <figure>
                                                <img src="{{ asset($value->image) }}" class="img-fluid" alt="">
                                            </figure>
                                        </div>
                                        <h6>{!! $value->title !!}</h6>
                                    @endforeach

                                    {{-- <div class="bli-img">
                                        <figure>
                                            <img src="{{ asset('images/49.jpg') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div> --}}

                                    {{-- <div class="bli-img">
                                        <figure>
                                            <img src="{{ asset('images/11.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                    <h6>Recognition for Performance Excellence In Sales and Marketing of Kyocera
                                        Products <span class="d-block">2019</span></h6>
                                    <div class="bli-img">
                                        <figure>
                                            <img src="{{ asset('images/12.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                    <h6>Recognition for Excellence Award In providing Business Solutions Application
                                        Technical <span class="d-block">Support of Kyocera Equipment and IT
                                            Connectivity</span></h6> --}}
                                    <div class="bli-img">
                                        <figure class="d-flex">
                                            <img src="{{ asset('images/app-35.jpg') }}" class="img-fluid" alt="">
                                            <img src="{{ asset('images/50.jpg') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="col-lg-3">
                    <div class="side-form">
                        <h3>REQUEST A QUOTE</h3>
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name"
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
                                        <input type="text" name="company" class="form-control" placeholder="Company"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" id="textarea" class="form-control" placeholder="Message" cols="30" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn custom-btn-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
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
