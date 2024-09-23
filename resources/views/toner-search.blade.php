@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->

    <section class="inner-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="gray-back">
                        <div class="border-pad">
                            
                            <h4>Search results for: {{ $name }}</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="para-ecoys">
                        <p>{!! $subcategory->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-tabs inner-Product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    
                    <form method="POST" action="{{ route('tonerSearch') }}">
                    @csrf
                    <div class="mouse-static">
                        @php
                            if($subcategory == null){
                            $sub = $id;
                            }else{
                            $sub = $subcategory->id;
                            }
                            
                        @endphp
                        <input type="hidden" name="subcat" value="{{ $cat }}">
                         <input class="form-control" name="toner_type" value="{{ $name }}">   
                         <button type="submit" class="btn green-btn">Search</button>
                    </div>
                    </form>
                    
               </div>
               @if(count($products) > 0)
                @foreach($products as $value)
                <div class="col-lg-3  col-md-3 col-6">
                        <div class="main-fps">
                            <div class="printers">
                                <img src="{{ asset($value->image) }}" class="img-fluid" alt="">

                            </div>
                            <div class="para-center">
                                <h6>{{ $value->product_title }}</h6>

                            </div>
                            @if((int)$value->price > 50 && (int)$value->price <= 2500)
                            <div class="para-bottom">
                                <a href="{{ route('shopDetail', ['id' => $value->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $value->product_title)))]) }}" class="btn green-btn">Req a Quote</a>
                                <a href="{{ route('shopDetail', ['id' => $value->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $value->product_title)))]) }}" class="btn green-btn">Buy Product</a>
                            </div>
                            @else
                            <div class="para-bottom">
                                <a href="{{ route('shopDetail', ['id' => $value->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $value->product_title)))]) }}" class="btn green-btn">Req a Quote</a>
                                <a href="{{ route('shopDetail', ['id' => $value->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $value->product_title)))]) }}" class="btn green-btn">View Product</a>
                            </div>
                            @endif

                        </div>
                    </div>
                @endforeach
                
              @else
                <div class="col-lg-12 col-md-12 col-12 not-found">
                    <h2>Coming Soon</h2>
                </div>
              @endif

            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
    .not-found {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 0px 70px 0px;
    }

    .not-found h2 {
        font-size: 50px;
        text-transform: uppercase;
    }

    .para-bottom {
        display: flex !important;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        padding: 0px 10px;
    }

    .product-tabs .para-bottom .btn.green-btn {
        margin-left: 0px;
        margin-top: 0px;
        border-radius: 30px;
        background: #037523 !important;
        font-size: 12px;
    }

    .mouse-static {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .mouse-static .green-btn {
        text-transform: uppercase;
        background: linear-gradient( 346deg, rgba(195, 59, 61, 1) 0%, rgba(121, 9, 11, 1) 44% ) !important;
        border-radius: 0;
        font-size: 16px;
        border: none;
        padding: 7px 20px;
        margin: 0;
    }
    
    .mouse-static .form-control {
        width: 23%;
        margin-left: auto;
    }


    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
