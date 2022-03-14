
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
                Add Category
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>process</th>
                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($category as $v_category)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $v_category->name }}</td>
                               <!-- <td><img src=  "attachments/categories/{{$v_category->name}}/{{$v_category->image['filename']}}" width= "70px"  height="70px" alt="Image"></td>-->
                               <td><img src=  "attachments/categories/{{$v_category->image['filename']}}" width= "70px"  height="70px" alt="Image"></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_category->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_category->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

          
              
        
         <!-- edit_modal_category -->
<div class="modal fade" id="edit{{$v_category->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update Category
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('Categories.update', 'test') }}" method="Post" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2" >
                               Category Name :</label>
                            <input id="Name" type="text" name="name" class="form-control"
                                value="{{ $v_category->name }}">
                        </div>

                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $v_category->id }}">

                     <br>

                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="academic_year">Photo: <span class="text-danger">*</span></label>
                                  <input type="file" accept="image/*" name="photo[]" > <br> 
                                  <img src=  "attachments/categories/{{$v_category->image['filename']}}"   height="70px"  width="70px" />
                              </div>
                          </div>

                        
                    </div>
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"></button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>

  <!-- delete_modal_category -->
  <div class="modal fade" id="delete{{$v_category->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE CATEGORY
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Categories.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete  {{ $v_category->name }}  Category

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $v_category->id }}">
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
  

      


          <!-- add_modal_Grade -->
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
                <form action="{{ route('Categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                               Category Name :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
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
                    data-dismiss="modal"></button>
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



