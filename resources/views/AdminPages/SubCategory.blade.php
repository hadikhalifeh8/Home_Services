
@extends('layouts.base')
@section('content')

@toastr_css

    
<div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>All Services</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>/</li>
                            <li>Service Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
                    
            
                
           
           
              
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Add SubCategory
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Sub_Category Name</th>
                      <th>Category Name</th>
                      <th>Photo</th>
                      <th>process</th>
                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($subcategory as $V_subcategory)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $V_subcategory->name }}</td>
                                <td>{{ $V_subcategory->category_rltn->name }}</td>
                                <td><img src=  "attachments/subcategories/{{$V_subcategory->image['filename']}}" width= "70px"  height="70px" alt="Image"></td>
                               
                                
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$V_subcategory->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$V_subcategory->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

          
              
        
         <!-- update_modal_Subcategory -->
         <div class="modal fade" id="edit{{$V_subcategory->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Update SubCategory
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- update_form -->
                <form action="{{ route('SubCategory.update', 'test') }}" method="POST"  enctype="multipart/form-data">
                {{ method_field('patch') }}   
                @csrf
                    <div class="row">
                        <div class=" col">
                            <label for="Name" class="mr-sm-2">
                                SubCategory :</label>
                            <input id="Name" type="text" name="name" value="{{$V_subcategory->name}}" class="form-control" >
                       
                            <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $V_subcategory->id }}">
                        </div>
                        <br>


                        <div class=" col">
                                <label for="inputState">Category Name</label>
                                <select class="custom-select mr-sm-2" name="category"  {{$V_subcategory->category}}>
                                    <option value ="{{$V_subcategory->category_rltn->id}}"> {{$V_subcategory->category_rltn->name}} </option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for="academic_year">Photo: <span class="text-danger">*</span></label>
                                  <input type="file" accept="image/*" name="photo[]"> <br>
                                  <img src=  "attachments/subcategories/{{$V_subcategory->image['filename']}}"   height="70px"  width="70px" />
                              </div>
                          </div>
                        
                    </div>
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>

  <!-- delete_modal_category -->
  <div class="modal fade" id="delete{{$V_subcategory->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE SUBCATEGORY
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('SubCategory.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete This Category

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $V_subcategory->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
  
 



  
@endforeach

                  

              
           </table>
          </div>
          </div>
        </div>   
      </div>
  

      

   <!-- add_modal_subcategory -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('SubCategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" col">
                            <label for="Name" class="mr-sm-2">
                                SubCategory :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        </div>
                        <br>

                        <div class=" col">
                                <label for="inputState">Category Name</label>
                                <select class="custom-select mr-sm-2" name="category" required>
                                    <option selected disabled>Choose a Category ...</option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">Photo: <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photo[]" >
                        </div>
                    </div>

                        
                    
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
            </form>

        </div>
    </div>
</div>



   @jquery
   @toastr_js
    @toastr_render
        

@endsection



