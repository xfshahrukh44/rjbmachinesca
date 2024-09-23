@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->


    <section class="inner-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="gray-back">
                        <div class="border-pad">
                            <h4>
                                {{ $product_detail->product_title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="mfps managed-mfps">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="side-slides side-form">
                        <a href="#" id="backButton" class="btn custom-btn-2">Go Back</a>
                        <div class="pro-slides-machine">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset($product_detail->image) }}" class="img-fluid" />
                                    </div>
                                    @foreach ($product_imagess as $val)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($val->image) }}" class="img-fluid" alt="{{$val->alt_tag}}"/>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <img src="{{ asset($product_detail->image) }}" class="img-fluid" />
                                    </div>
                                    @foreach ($product_imagess as $val)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($val->image) }}" class="img-fluid" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if($product_detail->ebrochure != null)
                        <a href="{{ asset($product_detail->ebrochure) }}" class="btn custom-btn-2" target="_blank"> View eBrochure</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="main-mfps">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="side-form">
                                    <h3> PRODUCT OVERVIEW </h3>
                                </div>
                                <div class="img-side-mfps bef-none">

                                    <h4> {{ $product_detail->product_title }}</h4>
                                    @if($product_detail->product_type == 1)


                                        <form class="h-100 d-flex flex-column justify-content-center align-items-start" method="post"
                                        action="{{ route('save_cart') }}" id="add-cart">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">
                                        
                                        @if($product_detail->is_featured == 1 || $product_detail->id != 16)
                                        <p class="price">$ {{ number_format($product_detail->quarter_special_price) }}</p>
                                        @else
                                        <p class="price">$ {{ number_format($product_detail->price) }}</p>
                                        @endif
                                        
                                        
                                        <div class="stock"> {!! ($product_detail->stock_inventory > 0) ? '<strong class="in-stock">In Stock</strong>' : '<strong class="out-of-stock">Out of Stock</strong>' !!}</div>
                                        
                                        {{-- @foreach ($att_model as $att_models)
                                            <div class="variation">
                                                <h2>{{ $att_models->attribute->name }}</h2>
                                                @php
                                                    $pro_att = \App\ProductAttribute::where(['attribute_id' => $att_models->attribute_id, 'product_id' => $product_detail->id])->get();
                                                @endphp
                                                <select name="variation[{{ $att_models->attribute->name }}]">
                                                    @foreach ($pro_att as $pro_atts)
                                                        <option value="{{ $pro_atts->attributesValues->id }}">
                                                            {{ $pro_atts->attributesValues->value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach --}}
                                        <div class="cart-pros">
                                            <div class="qty">
                                                <span class="minus bg-dark">-</span>
                                                <input type="number" id="addcount" class="count" name="qty" value="1">
                                                <span class="plus bg-dark">+</span>
                                            </div>


                                            <a id="addCart" class="qty btn btnDonate {!! ($product_detail->stock_inventory > 0) ? '' : 'disabled' !!}" href="javascript:void(0)" class="nav-link btn btn-red"
                                                id="addCart">Add To Cart</a>
                                        </div>


                                    </form>
                                    @endif
                                    {!! $product_detail->description !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="side-form">
                        <h3>REQUEST A QUOTE</h3>
                        <form id="contactform">
                            @csrf
                            <input type="hidden" name="form_name" value="Inquiry for: {{ $product_detail->product_title }}">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="product_name" value="{{ $product_detail->product_title }}">
                            <input type="hidden" name="url" id="url" value="{{ route('shopDetail', ['id' => $product_detail->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $product_detail->product_title)))]) }}"/>
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
                                    <button type="submit" class="btn custom-btn-2" {{ ($product_detail->product_type == 1)? 'disabled' : '' }}>Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-2" id="contactformsresult"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    
    </div>
    </div>

    </section>



   

   

    <!-- ============================================================== -->
    <!-- BODY END HERE -->
    <!-- ============================================================== -->
@endsection
@section('css')
    <style>
        .price {
            font-size: 30px;
        }

        h1.red {
            font-size: 70px;
        }

        section.main-pro-dtail {
            padding: 100px 0px;
        }

        .variation h2 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .variation {
            padding: 0px 0px 20px 0px;
        }

        .wunty-check h1 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .variation select {
            width: 100%;
            height: 36px;
            padding: 0px 10px;
            text-transform: capitalize;
            font-weight: 400;
        }

        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
        }

        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
        }

        .qty .minus {
            cursor: pointer;
            display: inline-block;

            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }

        .qty {
            text-align: center;
        }

        .btnDonate {
            background-color: #cb0618;
            width: 100%;
            color: white;

        }

        .btnDonate:hover {
            background-color: white;
            width: 100%;
            color: #cb0618;
            border: 1px solid #cb0618;


        }

        .special-bo-info hr {
            margin: 4px 0px 5px;
            width: 90%;
        }

        .product-details-content hr {
            border-top: 2px solid rgba(0, 0, 0, .1);
            border-style: dashed;
            margin: 8px 0px;
        }

        .minus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        .plus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        input.count {
            border: 0;
            width: 2%;
        }

        .variation h2 {
            text-align: left;
        }

        .w-100 {
            width: 570px;
        }

        .slider-thumb {
            border: 2px solid black;

        }

        /* Slider */
        .slick-slider {
            position: relative;

            display: block;
            box-sizing: border-box;

            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            position: relative;

            display: block;
            overflow: hidden;

            margin: 0;
            padding: 0;
        }

        .slick-list:focus {
            outline: none;
        }

        .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track {
            position: relative;
            top: 0;
            left: 0;

            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .slick-track:before,
        .slick-track:after {
            display: table;

            content: '';
        }

        .slick-track:after {
            clear: both;
        }

        .slick-loading .slick-track {
            visibility: hidden;
        }

        .slick-slide {
            display: none;
            float: left;

            height: 100%;
            min-height: 1px;
        }

        [dir='rtl'] .slick-slide {
            float: right;
        }

        .slick-slide img {
            display: block;
        }

        .slick-slide.slick-loading img {
            display: none;
        }

        .slick-slide.dragging img {
            pointer-events: none;
        }

        .slick-initialized .slick-slide {
            display: block;
        }

        .slick-loading .slick-slide {
            visibility: hidden;
        }

        .slick-vertical .slick-slide {
            display: block;

            height: auto;

            border: 1px solid transparent;
        }

        .slick-arrow.slick-hidden {
            display: none;
        }

        .product-img--main__image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: contain;
            background-position: center;

            background-repeat: no-repeat;
            -webkit-transition: -webkit-transform .5s ease-out;
            transition: -webkit-transform .5s ease-out;
            transition: transform .5s ease-out;
            transition: transform .5s ease-out, -webkit-transform .5s ease-out;
        }

        .product-img--main {

            position: relative;
            overflow: hidden;
            height: 500px;
            width: 100%;
        }

        p.price {
            margin-top: 0px;
            color: #710303;
            font-family: 'Oswald';
            font-size: 24px;
            font-weight: 500;
        }

        .cart-pros {
            display: flex;
        }

        .cart-pros .qty {
            text-align: left;
        }

        #addCart {
            text-align: center;
            background: #710303;
        }

        #addCart:hover {
            background: #000;
            color: #fff;
            border: 1px solid #000;
        }
        
        strong.in-stock {
            color: green;
        }
        
        strong.out-of-stock {
            color: red;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', "#addCart", function(e) {
            console.log($('#addcount').val())
            $('#add-cart').submit();
        });

        $(document).on('keydown keyup', ".qty", function(e) {
            if ($(this).val() <= 1) {
                e.preventDefault();
                $(this).val(1);
            }
        });
        $(document).ready(function() {
            $(document).on('click', '.plus', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });

        $('.product-img--main')
            // tile mouse actions
            .on('mouseover', function() {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(' + $(this).attr('data-scale') + ')'
                });
            })
            .on('mouseout', function() {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(1)'
                });
            })
            .on('mousemove', function(e) {
                $(this).children('.product-img--main__image').css({
                    'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e
                        .pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
                });
            })
            // tiles set up
            .each(function() {
                $(this)
                    // add a image container
                    .append('<div class="product-img--main__image"></div>')
                    // set up a background image for each tile based on data-image attribute
                    .children('.product-img--main__image').css({
                        'background-image': 'url(' + $(this).attr('data-image') + ')'
                    });
            });
    </script>
        <script>
        document.getElementById("backButton").addEventListener("click", function() {
            window.history.back();
        });
    </script>
@endsection
