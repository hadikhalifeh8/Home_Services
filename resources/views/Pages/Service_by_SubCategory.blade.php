@extends('layouts.base')
@section('content')


      <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                @foreach($usr as $v_usr)
                    <h1>{{$v_usr->subcategory->name}}</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>/</li>
                            <li>{{optional($v_usr->category_rltn)->name}}</li> 
                           
                        </ul>
                    </div>
                    @endforeach
                </div>
               
            </div>
        </div>
        <section class="content-central">
        <div class="container">
        
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                       
                        <hr class="tall"> 
                    </div>
                </div>
            </div>
       
           
            <div class="content_info" style="margin-top: -70px;">
                <div>
                    <div class="container">
                        <div class="portfolioContainer">
                            @if($usr->count() > 0)
                        @foreach($usr as $v_usr)
                           
                            <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                               
                                <a class="g-list" href="{{ route('book_show', $v_usr->name) }}">
                                    <div class="img-hover">
                                    
                                        <img src="{{asset('attachments/serviceprovider/'.$v_usr->image->filename)}}"
                                         alt="{{$v_usr->name}}"
                                            class="img-responsive"/>
                                      
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{$v_usr->name}}</h3>
                                        <hr class="separator">
                                        <p>{{$v_usr->subcategory->name}}</p>
                                        <div class="content-btn"><a href="{{ route('book_show', $v_usr->name) }}"
                                                class="btn btn-primary">Book Now</a></div>
                                        <div class="price"><span>&#36;</span><b>From</b>{{$v_usr->price}}</div>
                                    </div>
                                </a>
                            </div>
                           
                            @endforeach
                            @else 
                            <h2> There is no Serve Providers </h2>
                            @endif
                        </div>
                       
                    </div>
                </div>
               
            </div>        
             
        </section>

        @endsection