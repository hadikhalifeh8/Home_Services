@extends('layouts.base')
@section('content')


<section class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="assets/img/slide/1.jpg" alt="fullslide1" data-bgposition="center center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                    <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="assets/img/slide/2.jpg" alt="fullslide1" data-bgposition="top center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
            <div class="filter-title">
                <div class="title-header">
                    <h2 style="color:#fff;">BOOK A SERVICE</h2>
                    <p class="lead">Book a service at very affordable price, </p>
                </div>
                <div class="filter-header">
                    <form id="sform" action="searchservices" method="post">                        
                        <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                            class="input-large typeahead" autocomplete="off">
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div>
            </div>
        </section>
        <section class="content-central">
            <div class="content_info content_resalt">
                <div class="container" style="margin-top: 40px;">
                    <div class="row">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        
                       
                            <ul id="sponsors" class="tooltip-hover">
                            @foreach($subcategory as $V_subcategory)
                                <li data-toggle="tooltip" title="" data-original-title="{{$V_subcategory->name}}"> <a
                                        href="{{ url('Service/'.$V_subcategory->category_rltn->name.'/'.$V_subcategory->name) }}">
                                        <img src="attachments/subcategories/{{$V_subcategory->image['filename']}}" height="60px"  width="60px" 
                                            alt="{{$V_subcategory->name}}"/></a></li>   
                                            @endforeach
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="semiboxshadow text-center">
                <img src="assets/img/img-theme/shp.png" class="img-responsive" alt="">
            </div>
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="titles">
                                <h2>Service <span>Providers</span> </h2>
                                <i class="fa fa-plane"></i>
                                <hr class="tall">
                            </div>
                        </div>
                        <div class="portfolioContainer" style="margin-top: -50px;">
                        @foreach($sprovider as $V_sprovider)
                            <div class="col-xs-6 col-sm-4 col-md-3 hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{ route('book_show', $V_sprovider->name) }}">
                                    <div class="img-hover">
                                        <img src="attachments/serviceprovider/{{$V_sprovider->image['filename']}}" width= "500px"  height="800px" alt="{{$V_sprovider->name}}"
                                            class="img-responsive">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{$V_sprovider->name}}</h3>
                                        <hr class="separator">
                                        <p>{{$V_sprovider->subcategory->name}}</p>
                                        <div class="content-btn"><a href="{{ route('book_show', $V_sprovider->name) }}"
                                                class="btn btn-primary">Book Now</a></div>
                                        <div class="price"><span>&#36;</span><b>From</b>{{$V_sprovider->price}}</div>
                                    </div>
                                </a>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_info">
                <div class="bg-dark color-white border-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="services-lines-info">
                                    <h2>WELCOME TO DIVERSIFIED</h2>
                                    <p class="lead">
                                        Book best services at one place.
                                        <span class="line"></span>
                                    </p>

                                  <a href="{{route('categories.all')}}">  <p><h2>Find All Categories Here.</p></a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <ul class="services-lines">
                                    @foreach($category_8 as $V_category)
                                    <li>
                                        <a href="{{ url($V_category->name) }}">
                                            <div class="item-service-line">
                                                <i class="fa"><img class="icon-img"
                                                        src="attachments/categories/{{$V_category->image['filename']}}" width= "70px"  height="70px" alt="Image"></i>
                                                <h5>{{$V_category->name}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                  
                                   @endforeach
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2><span>Service</span>Providers</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                </div>
                <div id="boxes-carousel">
                @foreach($sprovider_5 as $V_sproviders)
                    <div>
                       
                        <a class="g-list" href="{{ route('book_show', $V_sprovider->name) }}">
                            <div class="img-hover">
                                <img src="attachments/serviceprovider/{{$V_sproviders->image['filename']}}"  alt="" class="img-responsive">
                            </div>

                            <div class="info-gallery">
                                <h3>{{$V_sproviders->name}}</h3>
                                <hr class="separator">
                                <p>{{$V_sproviders->subcategory->name}}</p>
                                <div class="content-btn"><a href="{{ route('book_show', $V_sprovider->name) }}"
                                        class="btn btn-primary">Book Now</a></div>
                                <div class="price"><span>&#36;</span><b>From</b>{{$V_sproviders->price}}</div>
                            </div>
                        </a>
                        
                    </div>
                  
                  
                   
             
            
                    @endforeach
               
              
                </div>
            </div>
        </section>
        @endsection