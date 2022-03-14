@extends('layouts.base')

@section('content')

<div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Registeration</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="index.php.html">Home</a></li>
                            <li>/</li>
                            <li>Registeration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="semiboxshadow text-center">
            </div>
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 profile1" style="padding-bottom:40px;">
                            <div class="thinborder-ontop">
                                <h3>User Info</h3>
                                <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                                  @csrf  

                                <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  >
                                @error('name')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                            </div>
                           
                        </div>
                                                                    
                                    
                                
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Register As</label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="registeras" id="registeras_id" onchange="changes()">
                                        <option value="SVP">Service Provider</option>
                                        <option value="CST">Customer</option>
                                            
                                        </select>
                                    </div>
                                   </div>

                                   <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" >
                                           
                                            @error('phone')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                        </div>
                                       
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Address</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" >
                                      
                                            @error('address')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror

                                        </div>
                                       
                                    </div>

                                    <div class="form-group row" id="exp_hide_if_cst_select">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Experiance</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('experiance') is-invalid @enderror" placeholder="years" name="experiance"  id="experiance"  >
                                            @error('experiance')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row" id="prc_hide_if_cst_select" >
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Price</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('price') is-invalid @enderror"  name="price"  id="experiance"  >
                                            @error('price')
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                        </div>
                                    </div>

                            

                            <div class="form-group row" id="cat_hide_if_cst_select">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Category Name</label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="category" id="registeras_id">
                                        <option   selected disabled>Choose a Category ...</option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                            
                                        </select>

                                        @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                   </div>




                                   <div class="form-group row" id="sub_cat_hide_if_cst_select">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Sub Category</label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="subcategory" >
   
                                        </select>

                                        @error('subcategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                   </div>


                    <div class="form-group row" id="photo_hide_if_cst_select">
                        <label for="academic_year" class="col-md-4 col-form-label text-md-right">Photo: <span class="text-danger">*</span></label>
                        <div class="col-md-6"> 
                            <input type="file" accept="image/*" name="photo[]" >

                            @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div> 


                    <div class="form-group row" id="cat_hide_if_cst_select">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">province</label>
                                        <div class="col-md-6">
                                        <select class="form-control" name="province" id="registeras_id">
                                        <option   selected disabled>Choose a Province ...</option>
                                    @foreach($province as $V_province)
                                        <option value="{{$V_province->id}}">{{$V_province->name}}</option>
                                    @endforeach
                                            
                                        </select>

                                        @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                   </div>




                                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                                   
                                    <div class="form-group row mb-0">
                                        <div class="col-md-10">
                                            <span style="font-size: 14px;">If you have already registered <a
                                                    href="{{ route('login') }}" title="Login">click here</a> to login</span>
                                            <button type="submit" class="btn btn-primary pull-right">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  



            <script>
        function changes()
        {
            var status = document.getElementById("registeras_id");

            //if Customer selected hide  experiance 
            if(status.value == "CST")
            {
                document.getElementById("exp_hide_if_cst_select").style.visibility="hidden";
            } 
            else
            {
                document.getElementById("exp_hide_if_cst_select").style.visibility= "visible";
            } 

            //if Customer selected hide  category 
            if(status.value == "CST")
            {
                document.getElementById("cat_hide_if_cst_select").style.visibility="hidden";
            } 
            else
            {
                document.getElementById("cat_hide_if_cst_select").style.visibility= "visible";
            }


             //if Customer selected hide sub_category 
            if(status.value == "CST")
            {
                document.getElementById("sub_cat_hide_if_cst_select").style.visibility="hidden";
            } 
            else
            {
                document.getElementById("sub_cat_hide_if_cst_select").style.visibility= "visible";
            }

            //if Customer selected hide Photo 
            if(status.value == "CST")
            {
                document.getElementById("photo_hide_if_cst_select").style.visibility="hidden";
            } 
            else
            {
                document.getElementById("photo_hide_if_cst_select").style.visibility= "visible";
            } 
            

             //if Customer selected hide price 
             if(status.value == "CST")
            {
                document.getElementById("prc_hide_if_cst_select").style.visibility="hidden";
            } 
            else
            {
                document.getElementById("prc_hide_if_cst_select").style.visibility= "visible";
            }
        }
        
    </script>









@endsection
