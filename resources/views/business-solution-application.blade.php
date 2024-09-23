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
                              <h4>{{ $page->name }}</h4>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>



<section class="mfps">
     <div class="container">
          <div class="row">
               {!! $page->content !!}
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
