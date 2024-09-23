@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
    
<style>
    @media (max-width: 575px) {
        
        /*.banner-carousel {*/
        /*    display: none !important;*/
        /*}*/
        .mian-flex {
    margin-top: 20px;
}

    }
</style>

    
    
    <section class="machine-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12 p-0">
                    <div class="banner-carousel owl-carousel owl-theme">
                        
                        @foreach ($banner as $key => $value)
                            
                            <div class="item">
                                
                                <div class="main-Carousel">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="hewlett">
                                                @if($value->id == 3)
                                                <a href="{{ route('promotions') }}">
                                                @elseif($value->id == 4 || $value->id == 29)
                                                <a href="{!! App\Http\Traits\HelperTrait::returnFlag(682) !!}">
                                                @else
                                                <a href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}">
                                                @endif
                                                    <img <?php if($key != '0'){ echo 'data-src';}else{ echo 'src'; } ?>="{{ asset($value->image) }}"  class="<?php if($key != '0'){ echo 'lazy'; } ?> img-fluid"  alt="{{$value->alt_tag}}">
                                                @if($value->id == 3)
                                                </a>
                                                @elseif($value->id == 4)
                                                </a>
                                                @else
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 p-0">
                    <div class="top-form">
                        <h3>For Free <span class="d-block">Consultation </span></h3>
                        <form id="contactform">
                            @csrf
                            <input type="hidden" name="form_name" value="Banner Form">
                            <div class="form-group">
                                <input type="text" name="fname" placeholder="Name" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control"
                                    required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone" class="form-control"
                                    required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_company" placeholder="Company" class="form-control"
                                    required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="notes" placeholder="Message" class="form-control"
                                    required="">
                            </div>
                            <button type="submit" class="btn green-btn">Submit</button>
                        </form>
                        <div class="mt-2" id="contactformsresult"></div>
                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-12 p-0">
                    <div class="promotion">
                        <a href="{{ route('promotions') }}" class="btn green-btn">View Promotions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="four-mfps">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mouse-static">
                        <h2>Featured Products</h2>
                    </div>
                </div>
                @foreach ($featuredProducts as $key2 => $value)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="main-fps">
                            <div class="printers">
                                <!--<img <?php if($key2 != '0'){ echo 'data-src';}else{ echo 'src'; } ?>="{{ asset($value->image) }}"  class="img-fluid <?php if($key2 != '0'){ echo 'lazy'; } ?>" width="100%" height="100%" alt="{{$value->alt_tag}}">-->
                                <img data-src="{{ asset($value->image) }}"  class="img-fluid lazy" width="100%" height="100%" alt="{{$value->alt_tag}}">
                            </div>
                            <div class="machine-one">
                                <h5>{{ $value->product_title }}</h5>
                                {!! $value->short_desc !!}

                            </div>
                            @if($value->id == 82)
                            <div class="red-back">

                              <h6>{!! $value->quarter_special !!}</span>
                                   <span class="d-block">includes service (labour), all parts &amp; Black</span>
                                   Toner
                              </h6>
                              <h6>{!! $value->rental_or_lease !!}</h6>
                         </div>
                            @else
                            <div class="red-back">
                                <h6>MSRP:${!! number_format($value->price) !!}</h6>
                                <h6>This Quarter Special: <br>{!! $value->quarter_special !!}</h6>
                                <h6>Rental or Lease Started From:<br> {!! $value->rental_or_lease !!}</h6>
                            </div>
                            @endif
                            <div class="para-bottom">
                                <p>{!! $value->optional !!}</p>
                                <h6>COST PER PAGE</h6>
                                <p class="para-sm">{!! $value->cost_per_page !!}</p>
                                <div class="btn-box">
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Req a Quote</a>

                                @if((int)$value->price > 50 && (int)$value->price <= 2500)
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Buy Product</a>
                                @else
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">View Product</a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>




    <section class="product-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mouse-static">
                        <h2>Select Product</h2>
                    </div>
                </div>
                @foreach ($subcategory as $value)
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="main-fps">
                        <div class="printers">
                            <img data-src="{{ asset($value->image) }}" class="lazy img-fluid" alt="{{$value->alt_tag}}">

                        </div>
                        <div class="para-center">
                            <h6>{{ $value->name }}</h6>

                        </div>
                        <div class="para-bottom">
                            <a href="{{ route('product-category', ['id' => $value->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $value->name)))]) }}" class="btn green-btn">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>


    <section class="video-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mouse-static">
                        <h2>Videos</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="main-video">
                        <h5>{!! $section[0]->value !!}</h5>
                        <video class="lazy" data-src="{!! $section[1]->value !!}" data-poster="{!! $section[4]->value !!}" controls="" height="300" width="500">
                            <source data-src="{!! $section[1]->value !!}" type="video/mp4" />
                            <source data-src="movie.ogg" type="video/ogg" /> Your browser does not support the video tag.
                        </video>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="main-video">
                        <h5>{!! $section[2]->value !!}</h5>
                        {!! $section[3]->value !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="main-video">
                        <figure>
                            <img data-src="{!! $section[4]->value !!}" height="300" width="500" class="lazy img-fluid" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="main-video">
                        <div class="mouse-static">
                            <h2>Videos</h2>
                        </div>
                        <div class="bor-img">
                            <div class="Current-video">
                                <div class="fi-img">
                                    <figure>
                                        <img data-src="{!! $section[5]->value !!}" height="300" width="500" class="lazy img-fluid" alt="">
                                    </figure>
                                </div>
                                <div class="current-info">
                                    {!! $section[6]->value !!}
                                    <a href="{{ route('promotions') }}">View Deals </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <!-- bottom html  -->
    <section class="Managed-Document-Services py">
        <div class="container-fluid">
            <div class="row">
                @foreach ($blog as $value)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-content">
                            <h3 class="heading-3">{{ $value->name }}</h3>
                            <figure>
                                <img data-src="{{ asset($value->image) }}" width="700" height="300" class="lazy img-fluid" alt="{{$value->alt_tag}}">
                            </figure>
                            <div class="btn-container text-center">
                                <a href="{{ route('blogs') }}" class="btn custom-btn-2">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section class="testimonials py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="heading-title">
                        <h3 class="custom-heading">
                            Testimonials
                        </h3>
                    </div>
                    <div class="testimonials-slider owl-carousel owl-theme">
                        @foreach ($testimonial as $value)
                            <div class="item">
                                <div class="custom-content-testimonials">
                                    <div class="testimonials-box">
                                        <div class="testimonials-detail">
                                            <strong class="testimonial-name">{{ $value->name }}</strong>
                                            <strong class="class=">{{ $value->designation }}</strong>
                                        </div>
                                        <div class="testimonial-text">
                                            <span class="fa fa-quote-left"></span>
                                            {!! $value->comments !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
