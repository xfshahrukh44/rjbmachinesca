<footer>

    <div class="container">

         <div class="row">

              <div class="col-lg-3 col-md-3 col-12">
                   <div class="ft-widget">
                        <h3>Company</h3>
                        <p>{!! App\Http\Traits\HelperTrait::returnFlag(1975) !!} </p>

                   </div>

              </div>

              <div class="col-lg-3 col-md-3 col-12">

                   <div class="ft-widget">

                        <h3>CONTACT US</h3>

                        <ul class="footer-adress">

                             <li><i class="fa fa-map-marker"></i><span>{!! App\Http\Traits\HelperTrait::returnFlag(519) !!}</span></li>

                             <li><i class="fa fa-phone"></i><span>Call Us : <a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(123) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(123) !!}</a></span></li>

                             <li><i class="fa fa-phone"></i><span>Fax : {!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}</span></li>

                             <li><i class="fa-regular fa-envelope"></i><span>Email : <a
                                            href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}</a></span>
                             </li>

                             <li><i class="fa-regular fa-envelope"></i><span>Email : <a
                                            href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(1974) !!}">{!! App\Http\Traits\HelperTrait::returnFlag(1974) !!}</a></span>
                             </li>

                        </ul>

                   </div>

              </div>

              <div class="col-lg-3 col-md-3 col-12">
                   <div class="ft-widget">
                        <h3>&nbsp;</h3>
                        {!! App\Http\Traits\HelperTrait::returnFlag(1966) !!}
                   </div>
              </div>
              <div class="col-lg-3 col-md-3 col-12">
                  <div class="footer-logos">
                      <img src="{{ asset('images/kyocera-logo.webp') }}" data-src="{{ asset('images/kyocera-logo.webp') }}" class="lazy img-fluid" alt="FooterLogo" title="FooterLogo" loading="lazy">
                      <img src="{{ asset('images/dmca_protected_sml_120m.webp') }}" data-src="{{ asset('images/dmca_protected_sml_120m.webp') }}" class="lazy img-fluid" alt="DMCALogo" title="DMCALogo" loading="lazy">
                  </div>
              </div>

         </div>

    </div>

    <div class="container">

         <div class="bt-footer">

              <div class="row">

                   <div class="col-sm-12 col-md-6 col-12  ">

                        <div class="copyright">

                             <p class="text-uppercase">{!! App\Http\Traits\HelperTrait::returnFlag(499) !!}</p>

                        </div>

                   </div>

                   <div class="col-12 col-sm-12 col-md-6">

                        <ul class="bt-social">

                             <li><a href="{!! App\Http\Traits\HelperTrait::returnFlag(682) !!}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                             </li>

                             <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>

                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->

                             <li><a href="{!! App\Http\Traits\HelperTrait::returnFlag(1962) !!}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                             </li>

                        </ul>

                   </div>

              </div>

         </div>
    </div>

    <div class="design-developed">
         <div class="container">
              <p><a href="javascript:;" target="_blank">Website design Toronto - <img height="10" width="40" src="{{ asset('images/esimplified.png') }}" alt="ESimplified" title="ESimplified" style="vertical-align:middle"></a></p>
         </div>
    </div>
</footer>
<!-- bottom html  -->

<!-- Modal -->
<div class="modal fade " id="center-Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content">
              <div class="modal-header">
                   <h5 class="modal-title" id="staticBackdropLabel">REQUEST INFORMATION
                   </h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                   <form>
                        <div class="row">
                             <div class="col-lg-6">
                                  <div class="form-group">
                                       <input type="text" name="name" class="form-control" placeholder="Name*"
                                            required="">
                                  </div>
                             </div>
                             <div class="col-lg-6">
                                  <div class="form-group">
                                       <input type="email" name="email" class="form-control" placeholder="Email*"
                                            required="">
                                  </div>
                             </div>
                             <div class="col-lg-6">
                                  <div class="form-group">
                                       <input type="text" name="phone" class="form-control" placeholder="Phone*"
                                            required="">
                                  </div>
                             </div>
                             <div class="col-lg-6">
                                  <div class="form-group">
                                       <input type="text" name="subject" class="form-control" placeholder="Subject*"
                                            required="">
                                  </div>
                             </div>
                             <div class="col-lg-12">
                                  <div class="form-group">
                                       <textarea name="message" id="textarea" class="form-control" cols="30" rows="5"
                                            placeholder="Comments or Questions*" required=""></textarea>
                                  </div>
                             </div>
                        </div>
                        <div class="end-btn">
                             <button class="btn red-btn">SUBMIT</button>
                        </div>
                   </form>
              </div>
         </div>
    </div>
</div>

<!-- modal -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
 Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
              <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Request Supplies Form</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                   <p>Request Supplies Form
                        Please fill in your supply request below. Once your request is processed
                        you will receive a confirmation email with a tracking number for your
                        shipment. If you have any questions regarding your order you are
                        welcome to contact our supplies desk at 416-831-8592</p>
                   <div class="modal-form-inputs">
                        <input type="text" class="form-control" placeholder="Company Name">
                        <input type="phone" class="form-control" placeholder="Phone Number">
                        <input type="email" class="form-control" placeholder="Email address">
                        <select class="form-select" aria-label="Default select example">
                             <option selected>Model of machine</option>
                             <option value="1">Kyocera A3 Multifunctionals Copiers</option>
                             <option value="2">Kyocera A4
                                  Multifunctionals Copiers</option>
                             <option value="3">Kyocera Printers</option>
                             <option value="4">PRE-OWNED
                                  MULTI-FUNCTION COPIER</option>
                           </select>
                        <input type="text" class="form-control" placeholder="Contact Name /Attention">
                        <textarea class="form-control" placeholder="Other Supplies Comments"></textarea>
                        <input type="address" class="form-control" placeholder="Shipping Address">

                   </div>
              </div>
              <div class="modal-footer">

                   <button type="submit" class="btn btn-primary modal-btn">Submit</button>
              </div>
         </div>
    </div>
</div>
