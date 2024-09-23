@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
    <section class="inner-banner shaded-back">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="gray-back">
                        <div class="border-pad">
                            <h4>{{ $page->page_name }}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="rental-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="main-renta">
                        @foreach ($promotion as $value)
                        <div class="f-rental">
                            <div class="rental-img">
                                <figure>
                                    <img src="{{ asset($value->image) }}" class="img-fluid" alt="{{ $value->alt_tag }}">
                                </figure>
                            </div>
                            <div class="rental-cont">
                                <h2>{{ $value->name }}</h2>
                                {!! $value->description !!}
                                <div class="btn-pdf">
                                    <a href="{{ asset($value->pdf) }}" target="_blank" class="btn custom-btn-2"> View
                                        Promotion</a>
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
