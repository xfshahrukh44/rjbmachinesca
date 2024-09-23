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
                            
                            @if(intval($name) == 0 &&  $type == 'machine')
                            <h4>All Products</h4>
                            @elseif(intval($name) == 2  && $type == 'machine')
                            <h4>B&amp;W MFP</h4>
                            @elseif(intval($name) == 3 && $type == 'machine')
                            <h4>Colour MFP</h4>
                            @elseif(intval($name) == 0 &&  $type == 'printer')
                            <h4>All Products</h4>
                            @elseif(intval($name) == 2  && $type == 'printer')
                            <h4>B&amp;W Printers</h4>
                            @elseif(intval($name) == 3 && $type == 'printer')
                            <h4>Colour Printers</h4>
                            
                            @else
                            <h4>{{ $name }}</h4>
                            @endif
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
                    @if($subcategory->id == 12)
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
                        <input type="hidden" name="subcat" value="{{ $sub }}">
                         <input class="form-control" name="toner_type">   
                         <button type="submit" class="btn green-btn">Search</button>
                    </div>
                    </form>
                    @else
                    <form method="POST" action="{{ route('productFilter') }}">
                    @csrf
                    <div class="mouse-static">
                        @php
                            if($subcategory == null){
                            $sub = $id;
                            }else{
                            $sub = $subcategory->id;
                            }
                            
                        @endphp
                        <input type="hidden" name="subcat" value="{{ $sub }}">
                        @if($subcategory->id == 3 || $subcategory->id == 21 || $subcategory->id == 22 || $type == 'printer')
                        <input type="hidden" name="subcat_type" value="printer">
                        @elseif($subcategory->id == 1 || $subcategory->id == 2 || $subcategory->id == 4  || $type == 'machine')
                        <input type="hidden" name="subcat_type" value="machine">
                        @else
                        <input type="hidden" name="subcat_type" value="">
                        @endif
                        
                         <select class="form-select" name="color_type" aria-label="Default select example">
                              @if($subcategory->id == 3 || $subcategory->id == 21 || $subcategory->id == 22 || $type == 'printer')
                              <option value="0" {{ ($name == 0) ? 'selected' : '' }}>All Products</option>
                              <option value="2" {{ ($name == 2) ? 'selected' : '' }}>B&amp;W Printers</option>
                              <option value="3" {{ ($name == 3) ? 'selected' : '' }}>Colour Printers</option>
                              @elseif($subcategory->id == 1 || $subcategory->id == 2 || $subcategory->id == 4 || $type == 'machine')
                              <option value="0" {{ ($name == 0) ? 'selected' : '' }}>All Products</option>
                              <option value="2" {{ ($name == 2) ? 'selected' : '' }}>B&amp;W MFP</option>
                              <option value="3" {{ ($name == 3) ? 'selected' : '' }}>Colour MFP</option>
                              @else
                              <option value="0" {{ ($name == 0) ? 'selected' : '' }}>All Products</option>
                              @endif
                         </select>
                         <button type="submit" class="btn green-btn">Filter</button>
                    </div>
                    </form>
                    @endif
               </div>
                @if($subcategory->id == 7 || $subcategory->id == 8 || $subcategory->id == 9 || $subcategory->id == 10 || $subcategory->id == 11)
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="side-form">
                        <h3>Request Supplies Form</h3>
                        <p class="mb-4">Request Supplies Form Please fill in your supply request below. Once your request is processed you will receive a confirmation email with a tracking number for your shipment. If you have any questions regarding your order you are welcome to contact our supplies desk at 416-831-8592</p>
                        <form id="contactform">
                            @csrf
                            <input type="hidden" name="form_name" value="Inquiry for: {{ $subcategory->name }}">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="product_name" value="{{ $subcategory->name }}">
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
                                    <div class="form-group mb-3">
                                    <select class="form-select" name="model" aria-label="Default select example">
                                      <option disabled selected="">Model of machine</option>
                                      <option value="Kyocera A3 Multifunctionals Copiers">Kyocera A3 Multifunctionals Copiers</option>
                                      <option value="Kyocera A4 Multifunctionals Copiers">Kyocera A4 Multifunctionals Copiers</option>
                                      <option value="Kyocera Printers">Kyocera Printers</option>
                                      <option value="PRE-OWNED MULTI-FUNCTION COPIER">PRE-OWNED MULTI-FUNCTION COPIER</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="notes" id="textarea" class="form-control" placeholder="Message" cols="30" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="shipping_address" class="form-control" placeholder="Shipping Address"
                                            required="">
                                    </div>
                                    <button type="submit" class="btn custom-btn-2" {{ ($product_detail->product_type == 1)? 'disabled' : '' }}>Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-2" id="contactformsresult"></div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
                @else
                @if($online_purchased != null)
                @foreach ($online_purchased as $value)
                    <div class="col-lg-3  col-md-3 col-6">
                        <div class="main-fps">
                            <div class="printers">
                                <img src="{{ asset($value->image) }}" class="img-fluid" alt="{{$value->alt_tag}}">

                            </div>
                            <div class="para-center">
                                <h6>{{ $value->product_title }}</h6>
                                

                            </div>
                            @if((int)$value->price > 50 && (int)$value->price <= 2500)
                            <div class="para-bottom">
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Req a Quote</a>
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Buy Product</a>
                            </div>
                            @else
                            <div class="para-bottom">
                            <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Req a Quote</a>
                            <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">View Product</a>
                            </div>
                            @endif

                        </div>
                    </div>
                @endforeach
                @endif
                @if($subcategory != null)
                @if(count($products) > 0)
                @foreach ($products as $value)
                    <div class="col-lg-3  col-md-3 col-6">
                        <div class="main-fps">
                            <div class="printers">
                                <img src="{{ asset($value->image) }}" class="img-fluid" alt="{{$value->alt_tag}}">

                            </div>
                            <div class="para-center">
                                <h6>{{ $value->product_title }}</h6>

                            </div>
                            @if((int)$value->price > 50 && (int)$value->price <= 2500)
                            <div class="para-bottom">
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Req a Quote</a>
                                <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Buy Product</a>
                            </div>
                            @else
                            <div class="para-bottom">
                            <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">Req a Quote</a>
                            <a href="{{ route('shopDetail', ['id' => $value->slug]) }}" class="btn green-btn">View Product</a>
                            </div>
                            @endif

                        </div>
                    </div>
                @endforeach
                

                @else
                @if($online_purchased != null)
                
                @else
                <div class="col-lg-12 col-md-12 col-12 not-found">
                    <h2>Coming Soon</h2>
                </div>
                @endif
                @endif
                
                @endif
                
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
