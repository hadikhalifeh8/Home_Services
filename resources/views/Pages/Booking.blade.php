@extends('layouts.base')
@section('content')


      
           
<form action="{{ route('book_store') }}" method="Post">
@csrf
 
     
<div class="card-body">

<!--@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<br>
                     <div class="row">

                <!--    <input id="id" type="text" name="id" class="form-control"
                                                            value="{{ $users->id }}"> -->

                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="">Name </label>
                                 <input type="text" class="form-control" id="validationCustomUsername" name="customer_name" value="{{Auth::user()->name}}"  readonly >
             @error('customer_name')
              <span class="text-danger"> {{$message}}  </span>
             @enderror
                             </div>

                            


                         </div>

                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="validationCustomUsername" name="customer_email" placeholder="Enter Email" value="{{Auth::user()->email}}"  readonly >
                      @error('customer_email')
                  <span class="text-danger"> {{$message}}  </span>
                       @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="validationCustomUsername" name="customer_phone" placeholder="Enter Phone"  value="{{Auth::user()->phone}}"  readonly>
                      @error('customer_phone')
                        <span class="text-danger"> {{$message}}  </span>
                        @enderror
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">province</label>
                                <select class="form-control" name="cst_province_id" id="registeras_id">
                                        <option   selected disabled>Choose a Province ...</option>
                                    @foreach($province as $V_province)
                                        <option value="{{$V_province->id}}">{{$V_province->name}}</option>
                                    @endforeach
                                            
                                        </select>
                      @error('cst_province_id')
                        <span class="text-danger"> {{$message}}  </span>
                        @enderror
                            </div>
                        </div>

                     </div>
                 
                     <div class="row">
                    
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="">Service Provider</label>
                                 <input type="text" class="form-control" id="validationCustomUsername" name="serviceprovider_name"  value = "{{$users->name}}" readonly >
                             </div>

                             <input id="id" type="hidden" name="serviceprovider_id" class="form-control"
                                                            value="{{ $users->id }}">
                         </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Category</label>
                                <input type="text" class="form-control" id="validationCustom03" name="category_name" value ="{{$users->category_rltn->name}}" readonly>
                            </div>

                            <input id="id" type="hidden" name="category_id" class="form-control"
                                                            value="{{ $users->category_rltn->id }}">


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Subcategory</label>
                                <input type="text" class="form-control" id="validationCustom04" name="subcategory_name" value ="{{$users->subcategory->name}}" readonly>
                            </div>

                            <input id="id" type="hidden" name="subcategory_id" class="form-control"
                                                            value="{{ $users->subcategory->id }}">              
                        </div>
                     </div>

                        

                     <div class="row" >
                     <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Book Date </label>
                                <input type="datetime-local" id="meeting-time" name="booking_date">   
                                @error('booking_date')
                        <span class="text-danger"> {{$message}}  </span>
                        @enderror
                              </div>
                        </div>

                     </div>
                     


</div>
  
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>


        
        





@endsection