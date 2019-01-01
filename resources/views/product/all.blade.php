



	    		  @extends('layout.master')


 @section('title')

All Products 
 @endsection


 @section('content')

 



 <div class="box">
            <div class="box-header">

                    @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-infox') }}">{{ Session::get('message') }}</p>

@endif
         <div class="box-body table-responsive no-padding">

         <a href="addproduct" class="btn btn-sm btn-default pull-right">Add New</a>
              <table class="table table-hover">
               
               
                <tr>
                    <th>Name</th>   
  <th>Description</th>   
  <th>Price</th>   
  <th>Category</th>   
  <th>Image1</th>   
  <th>Image2</th>   
 
                                    <th>Action</th>
                </tr>

    @foreach ($allproduct as $allproduct_col )
        
  

                <tr>
                   <td>{{$allproduct_col->name}}</td>  
<td>{{$allproduct_col->description}}</td>  
<td>{{$allproduct_col->price}}</td>  
<td>

    @foreach ($allcategories as  $allc )
       @if($allc->id == $allproduct_col->category)
        {{$allc->title}}
       @endif
    @endforeach

 

</td>  
<td><img src="{{asset('img/uploads')}}/{{$allproduct_col->image1}}" class="img-responsive img-circle" style="height:40px;" /></td> 



 <td><img src="{{asset('img/uploads')}}/{{$allproduct_col->image2}}" class="img-responsive img-circle" style="height:40px;" /></td> 



 


                  <td>
                       <button  data-toggle="modal" data-target="#modal-default_view{{$allproduct_col->id}}" class="btn btn-sm btn-default">
                       <i class="glyphicon glyphicon-eye-open"></i> </button>
               
                    <button  data-toggle="modal" data-target="#modal-default{{$allproduct_col->id}}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-edit"></i> </button>
                  
                      <form style="display:inline;" action="{{ route('user.deleteproduct')}}" method="post" onsubmit="return validate(this);">
                                        {{csrf_field()}}
                                        <input type="hidden" name="product_id" value="{{$allproduct_col->id}}" />
                                        <button type="submit" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
  
 
     <div class="modal fade" id="modal-default{{$allproduct_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">


     <form action="{{route('action.updateproduct')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">
 
        <input type="hidden" name="product_id" value="{{$allproduct_col->id}}" />

                {{csrf_field()}}

         
                <div class="form-group col-md-6">
                  <label for="f11">Name</label>
                  <input type="text" class="form-control" id="f111" name="name" value="{{$allproduct_col->name}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f12">Description</label>
                  <input type="text" class="form-control" id="f112" name="description" value="{{$allproduct_col->description}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f13">Price</label>
                  <input type="text" class="form-control" id="f113" name="price" value="{{$allproduct_col->price}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="f14">Category</label>
                 <!-- <input type="text" class="form-control" id="f114" name="category" value="{{$allproduct_col->category}}" >
                -->

                   <select   class="form-control" id="f114" name="category">
                  @foreach ($allcategories as  $allc )
                         <option {{ ($allc->id == $allproduct_col->category )? 'selected':'' }} value= {{$allc->id}}> {{$allc->title}} </option>
                  @endforeach
                  </select>

                
                </div><div class="form-group col-md-6">
                <img id="pre{{$allproduct_col->id}}" src="{{asset('img/uploads')}}/{{$allproduct_col->image1}}" class="img-responsive img-circle" style="height:40px;"/>
                  <label for="f3product">File input</label>
                  <input type="file" name="image1" onchange="prev({{$allproduct_col->id}})" id="product">
                  <input type="hidden" name="image1_update" value="{{$allproduct_col->image1}}" />
                  <p class="help-block">Product</p>
                </div>
                	<div class="form-group col-md-6">
                <img id="pre{{$allproduct_col->id}}" src="{{asset('img/uploads')}}/{{$allproduct_col->image2}}" class="img-responsive img-circle" style="height:40px;"/>
                  <label for="f3product">File input</label>
                  <input type="file" name="image2" onchange="prev({{$allproduct_col->id}})" id="product">
                  <input type="hidden" name="image2_update" value="{{$allproduct_col->image2}}" />
                  <p class="help-block">Product</p>
                </div>
                	
              
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
               </div>
               
              
              
              
              
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>

                  </form>  
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              
              
              
              
               <div class="modal fade" id="modal-default_view{{$allproduct_col->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View</h4>
              </div>
              <div class="modal-body">


               <div class="box-body table-responsive">

<table class="table table-bordered table-condensed table-hover ">
 
 
<tr>
<th> Name: </th>   

<td> 
 {{$allproduct_col->name}}

 </td>

</tr>

 
<tr>
<th> Description: </th>   

<td> 
 {{$allproduct_col->description}}

 </td>

</tr>

 
<tr>
<th> Price: </th>   

<td> 
 {{$allproduct_col->price}}

 </td>

</tr>

 
<tr>
<th> Category: </th>   

<td> 

    @foreach ($allcategories as  $allc )
       @if($allc->id == $allproduct_col->category)

 {{$allc->title}}
       @endif
    @endforeach

 

 </td>

</tr>

 
<tr>
<th> Image1: </th> 


<td> 
<img src="{{asset('img/uploads')}}/{{$allproduct_col->image1}}" class="img-responsive" style="height:100px;"/>

 </td>

</tr>

 
<tr>
<th> Image2: </th> 


<td> 
<img src="{{asset('img/uploads')}}/{{$allproduct_col->image2}}" class="img-responsive" style="height:100px;"/>

 </td>

</tr>


 
</table>

              
             
              
               
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
               </div>
               
              
              
              
              
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
 
               </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
              
              
              
              
              
              
              
                  </td>
                 </tr>
            @endforeach
              </table>
            </div>



            <div class="text-center">
    {!! $allproduct->render() !!}
            </div>

            </div>
            </div>

 

 @endsection

@section('scripts')
<script>
function validate(form, dis) {

    // validation code here ...

   if(confirm("Do you really want to do this?"))
    dis.submit();
  else
    return false;
 }

 function prev(id)
 {
 
     $("#pre"+id).hide();

 }
</script>
@endsection



	    