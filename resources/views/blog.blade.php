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
                            <h4>BLOG</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="mfps">
        <div class="container">
            <div class="row">
                
                <!--<div class="col-lg-12">-->
                <!--    <div class="main-mfps">-->
                <!--        <div class="row">-->
                <!--            <div class="col-lg-12">-->
                <!--                <div class="img-side-mfps">-->
                <!--                   {!! $page->content !!}-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                
                
                <div class="col-lg-12">
                    <div class="main-mfps">
                        <div class="row">
                            
                            @foreach($get_blog as $key => $val_blog)
                            <div class="col-lg-6 mb-5">


                                <div class="img-side-mfps">
                                
                                <hr>
                                
                                <h2> {{ $val_blog->name }} </h2>
                                
                                
                                    {!! \Illuminate\Support\Str::limit($val_blog->detail, 350, $end='...') !!} 
                                
                                <br><br>
                                
                                <div class="btn-container text-center">
                                    <a href="{{  URL('blog/'.$val_blog->slug) }}" class="btn custom-btn-2">Read More</a>
                                </div>
                                
                                
                                </div>


                            </div>
                            @endforeach
                            
                            
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


     .side-mfpss p span {
        font-family: "none" !important;
        font-weight: 400;
        font-size: 25px !important;
        margin-top: 20px;
        width: 99%;
        color: #212529;
    }

        
    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
