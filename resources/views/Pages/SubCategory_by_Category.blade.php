
@extends('layouts.base')
@section('content')


  <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
              
                @foreach($subcategory as $v_subcat_of_categ)
                    <h1>{{$v_subcat_of_categ->category_rltn->name}}</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>/</li>
                            <li>{{$v_subcat_of_categ->category_rltn->name}}</li>
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
                        
                     <!--   <h2>{{$Category_s->name}}</h2> -->
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                       
                    </div>
                </div>
            
            </div>
            <div class="content_info" style="margin-top: -70px;">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="services-lines full-services">

                        @if($subcategory->count() > 0)
                            @foreach($subcategory as $v_subcategory)

                            <li>
                                <div class="item-service-line">
                                    <i class="fa"><a href="{{ url('Service/'.$v_subcategory->category_rltn->name.'/'.$v_subcategory->name) }}"><img class="icon-img"
                                                src="attachments/subcategories/{{$v_subcategory->image['filename']}}" width= "80px"  height="80px" alt="{{$v_subcategory->name}}"></a></i>
                                    <h5>{{$v_subcategory->name}}</h5>
                                </div>
                            </li>
                            @endforeach
                         
                            @else 
                            <h2> Sorry!! There is no SubCategories in this Category </h2>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_info content_resalt">
                <div class="container">
                    <div class="row">
                        <div class="titles">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endsection