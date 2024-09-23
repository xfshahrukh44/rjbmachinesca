@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
    <?php

    $categories = DB::table('categories')->get();
    use App\wishlists;

    ?>


<section class="inner-banner">
    <div class="container">
         <div class="row align-items-center">
              <div class="col-lg-5 col-md-5 col-12">
                   <div class="gray-back">
                        <div class="border-pad">
                             <h4>A3 MULTIFUNCTIONALS UP TO 11" X 17"</h4>
                        </div>
                   </div>
              </div>
              <div class="col-lg-7 col-md-7 col-12">
                   <div class="para-ecoys">
                        <p>With our long-life ECOSYS and highly efficient and highly reliable TASKalfa technology,
                             Kyocera provides the industry’s most comprehensive line of award-winning low to
                             high-volume color and black and white A3 size (supports up to 11” x 17”) copiers and
                             multifunctional products (MFPs) that will help improve the workflow and efficiency of any
                             size business.</p>
                   </div>
              </div>
         </div>
    </div>
</section>




<section class="product-tabs inner-Product">
    <div class="container">
         <div class="row">
              <div class="col-lg-12 col-md-12 col-12">
                   <div class="mouse-static">
                        <select class="form-select" aria-label="Default select example">
                             <option value="a3-multifunctionals-up-to-11-x-17.php">All Products
                             </option>
                             <option value="a3-bw-mfp.php">A3 B&W MFP</a></option>
                             <option value="3"><a href="#">A3 Colour MFP</a></option>
                        </select>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/15.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>TASKalfa 9002i

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="taskalfa-9002i.php" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3   col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TSAKalfa 7004i <span class="d-block">Multifunction Copier-Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera Tasklafa 7054ci Colour <span class="d-block"> Multifunction Copier-
                                       Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASkalfa MZ4000i Mono <span class="d-block">Multifunction
                                       Copier/Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/10.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa MZ3200i Mono <span class="d-block">Multifunction Copier</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 6054ci Colour <span class="d-block">Multifunction
                                       Copier-Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/16.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 6053ci Colour <span class="d-block"> Multifunction Copier-
                                       Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 6004i <span class="d-block">Multifunction Copier-Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/16.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 6003i <span class="d-block">Multifunction Printer</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 5054ci Colour <span class="d-block">Multifunction
                                       Copier-Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/16.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 5053ci Colour <span class="d-block"> Multifunction Copier-
                                       Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 5004i <span class="d-block">Multifunction Copier-Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/17.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 5003i <span class="d-block">Multifunction Printer</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 4054ci Colour<span class="d-block">Multifunction
                                       Copier/Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/16.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 4053ci Colour <span class="d-block"> Multifunction Copier-
                                       Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 4004i Mono <span class="d-block">Multifunction Copier-Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/17.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 4003i <span class="d-block">Multifunction Copier – Printer</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 3554ci Colour<span class="d-block">Multifunction Copier-
                                       Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/17.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 3553ci Colour <span class="d-block"> Multifunction Copier-
                                       Printer</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/6.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 3253ci Coloiur <span class="d-block">Multifunction Copier-
                                       Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/8.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 2554ci Colour <span class="d-block">Multifunction Copier</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.png') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera TASKalfa 2553ci Colour<span class="d-block">Multifunction Copier-
                                       Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/18.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera ECOSYS M8130cidn Colour <span class="d-block"> multifunction Copier</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/19.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera ECOSYS M8124cidn Colour <span class="d-block">Multifunction Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/20.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera ECOSYS M4132idn <span class="d-block">Black/White Multifunction Printer</span>
                             </h6>
                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/19.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>Kyocera ECOSYS M4125idn<span class="d-block">Black/White Multifunction Printer</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>FREE Kyocera TASKalfa 5002i <span class="d-block"> Black/White A3 MFP</span>

                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3  col-md-3 col-6">
                   <div class="main-fps">
                        <div class="printers">
                             <img src="{{ asset('images/7.jpg') }}" class="img-fluid" alt="">

                        </div>
                        <div class="para-center">
                             <h6>FREE Kyocera TASKalfa 3252ci Colour <span class="d-block">A3 MFP</span>
                             </h6>

                        </div>
                        <div class="para-bottom">
                             <a href="#" class="btn green-btn">View Product</a>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</section>



    <!-- ============================================================== -->
    <!-- BODY END HERE -->
    <!-- ============================================================== -->
@endsection
@section('css')
    <style>
        .filter_sorting ul.list-group {
            margin-right: 25px !important;
            margin-top: 15px;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection
