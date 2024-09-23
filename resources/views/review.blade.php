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



    <section class="mfps">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-mfps">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="img-side-mfps">
                                    <h2> Deal with Thousands of people</h2>
                                    <div class="row aling-items-start">
                                        @foreach ($testimonial as $value)
                                        <div class="col-lg-6">
                                            <div class="main-reviews">
                                                <div class="box-review">
                                                    @if($value->name != null)
                                                    <p>Name :<span> {{ $value->name }}</span></p>
                                                    @endif
                                                    @if($value->email != null)
                                                    <p>Email :<span> <a
                                                                href="mailto:{{ $value->email }}">{{ $value->email }}</a></span>
                                                    </p>
                                                    @endif
                                                    @if($value->designation != null)
                                                    <p>About You :<span>{!! $value->designation !!}</span></p>
                                                    @endif
                                                    @if($value->location != null)
                                                    <p>Your Loaction :<span>{{ $value->location }}</span></p>
                                                    @endif
                                                    <p>Comments :<span>{!! $value->comments !!}</span></p>
                                                </div>
                                                <p>{{ $value->name }}</p>
                                            </div>
                                        </div>
                                        @endforeach
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

    <section class="submit-terminal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="terminal-form side-form" method="post" action="{{ route('reviews') }}">
                        @csrf
                        <h4>Submit A Testimonial</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                        required="" id="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                         id="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="designation" class="form-control" placeholder="About You"
                                         id="about-you">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Location"
                                         id="location">
                                </div>
                                <textarea name="comments" id="textarea" class="form-control" placeholder="Comments" cols="30" rows="5"></textarea>
                                <button type="submit" class="btn custom-btn-2">Submit</button>
                            </div>
                        </div>
                    </form>
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
