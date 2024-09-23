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



<section class="mfps it-solo">
     <div class="container">
          <div class="row">
               <div class="col-lg-9">
                    <div class="main-mfps">
                         <div class="row">
                              <div class="col-lg-12">
                                   <div class="img-side-mfps">
                                        {!! $page->content !!}
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
                            <input type="hidden" name="form_name" value="Inquiry for: IT Solutions">
                            <input type="hidden" name="type" value="2">
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
                                    <button type="submit" class="btn custom-btn-2">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-2" id="contactformsresult"></div>
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
