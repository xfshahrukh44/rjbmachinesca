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



    <section class="mfps about-inner-sec ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-mfps">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="img-side-mfps">
                                    {!! $page->content !!}
                                    <div class="bli-img">
                                        <figure>
                                            <img src="{{ asset($page->image) }}" class="img-fluid" alt="">
                                        </figure>
                                        <figure>
                                            <img src="{{ asset($section[0]->value) }}" class="img-fluid" alt="">
                                        </figure>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <a href="{{ asset($section[1]->value) }}" class="btn custom-btn-2" download="newfilename"> Reference Letter by Marco</a>
                                        <a href="{{ asset($section[2]->value) }}" class="btn custom-btn-2" download="newfilename"> Reference letter by Assadi</a>


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
