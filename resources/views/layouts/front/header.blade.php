<?php $segment = Request::segments(); ?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset($logo->img_path) }}" class="img-fluid" alt="Business Machines LTD">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="mian-flex">
                            <div class="top_info">
                                <span>.</span>
                                <div class="call_cl">
                                    <a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(59) !!} ">
                                        <i class="fa-solid fa-phone"></i>
                                        {!! App\Http\Traits\HelperTrait::returnFlag(59) !!} </a>
                                </div>
                                <div class="call_cl">
                                    <a href="tel:{!! App\Http\Traits\HelperTrait::returnFlag(123) !!}">
                                        <i class="fa-solid fa-phone"></i>
                                        {!! App\Http\Traits\HelperTrait::returnFlag(123) !!} </a>
                                </div>
                                <div class="call_cl">

                                    <a href="mailto:{!! App\Http\Traits\HelperTrait::returnFlag(218) !!} "> <i
                                            class="fa-solid fa-envelope"></i>{!! App\Http\Traits\HelperTrait::returnFlag(218) !!} </a>
                                </div>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">HOME</a>
                                </li>
                                @php
                                    $category = App\Category::all();
                                @endphp
                                <!--Menu 1-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[0]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[0]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[0]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[0]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[0]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[0]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>  
                                <!--Menu 2-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[1]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[1]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[1]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[1]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[1]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[1]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                
                                <!--Menu 6-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[5]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[5]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[5]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[5]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[5]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[5]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                
                                <!--Menu 3-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[2]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[2]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[2]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[2]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[2]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[2]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                
                                <!--Menu 4-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[3]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[3]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[3]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[3]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[3]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[3]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                
                                <!--Menu 5-->
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link" href="#">{{ $category[4]->name }} </a>
                                    <ul class="sub-menu">

                                        @foreach ($category[4]->cats as $val)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => $val->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $val->name)))]) }}">{{ $val->name }}</a>
                                        </li>
                                        @endforeach
                                        @if($category[4]->id == 1)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('promotions') }}">Promotions</a>
                                        </li>
                                        @endif
                                        @if($category[4]->id == 2)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('product-category', ['id' => 4]) }}">PRE-OWNED MULTI-FUNCTION COPIER</a>
                                        </li>
                                        @endif
                                        
                                        
                                        
                                        @if($category[4]->id == 4)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('business-solution-application') }}">Business Solution Applications</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('managed-document-services') }}">Managed Document Services</a>
                                        </li>
                                        @endif
                                        
                                        @if($category[4]->id == 5)
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('rj-business-services') }}">RJ BUSINESS SERVICE LTD</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('download-drivers') }}">Downloads Drivers</a>
                                        </li>
                                        <!--<li id="menu-item" class="menu-item"><a-->
                                        <!--    href="{{ route('order-toner') }}">Order Toner</a>-->
                                        <!--</li>-->
                                        <li id="menu-item" class="menu-item"><a
                                            href="{{ route('it-solutions') }}">IT Solutions</a>
                                        </li>
                                        @endif

                                    </ul>
                                </li>
                                
                                
                                

                                
                                <li class="nav-item dropdown-do">
                                    <a class="nav-link " href="{{ route('about') }}">ABOUT US</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item" class="menu-item"><a href="{{ route('about') }}">
                                                About Us</a></li>
                                        <li id="menu-item" class="menu-item"><a href="{{ route('blogs') }}">Blog</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a href="{{ route('news-press-release') }}">News
                                                Press
                                                Release</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a href="{{ route('kyocera-award') }}">Kyocera
                                                Award</a>
                                        </li>
                                        <li id="menu-item" class="menu-item"><a href="{{ route('review') }}">REVIEWS</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item ">
                                    <a class="nav-link " href="{{ route('contact') }}">CONTACT US</a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
