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
                                 <h4>{{ $blog_detail->name }}  </h4>
                            </div>
                       </div>
                  </div>
             </div>
        </div>
   </section>

    <br><br>

   <section class="mfps">
        <div class="container">
             <div class="row">
                
                 <div class="col-lg-12 mb-5">
    
                    <div class="img-side-mfps">
                    
                    <hr>
                    
                    <!--<h2> {{ $blog_detail->name }} </h2>-->
                    
                    {!! $blog_detail->detail !!} 
                    
                    
                    </div>
    
    
                </div>
                
             </div>
        </div>
   </section>
   
    <!--<div class="col-lg-12">-->
    <!--    <div class="main-mfps">-->
    <!--        <div class="row">-->
                
               
                
                
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
   
   
   <br><br>
   
@endsection
@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
