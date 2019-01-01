



	    		  @extends('layout.master')


 


 @section('title')

New  Product
 @endsection

 

 @section('content')

<div class="container">
<div class="row">

 

<div class="col-md-11">

  <!-- general form elements -->
          <div class="box box-primarny" style="margin-top:6%">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>


    @if(count($errors) >0 )

                            <div class="alert alert-danger">


                        @foreach($errors->all() as $error)

                        <p>{{ $error }}</p>


                        @endforeach
                            </div>

                        @endif


                 @if(Session::has('message'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

@endif
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('action.addproduct')}}" role="form" method="post"   enctype="multipart/form-data">
              <div class="box-body">


 
                <div class="form-group col-md-6">
                  <label for="f11">Name</label>
                  <input type="text" class="form-control" id="f111" name="name" 
                  value="{{old('name')}}" placeholder="">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f12">Description</label>
                  <input type="text" class="form-control" id="f112" name="description" 
                  value="{{old('description')}}" placeholder="">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f13">Price</label>
                  <input type="text" class="form-control" id="f113" name="price"
                   value="{{old('price')}}" placeholder="">
                </div> 
                <div class="form-group col-md-6">
                  <label for="f14">Category</label>
                  <select   class="form-control" id="f114" name="category">
                  @foreach ($allcategories as  $allc )
                         <option value= {{$allc->id}}> {{$allc->title}} </option>
                  @endforeach
                  </select>

                </div> 
                <div class="form-group col-md-6">
                  <label for="f15">Image1</label>
                  <input type="file" class="form-control" id="f115" name="image1" />
                 </div>
                <div class="form-group col-md-6">
                  <label for="f16">Image2</label>
                  <input type="file" class="form-control" id="f116" name="image2" />
                 </div>

                {{csrf_field()}}
              
           
      
       
              </div>
              <!-- /.box-body -->

              <div class="box-footer  clearfix text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>

<div class="col-md-1"></div>

</div>
</div>


 

 @endsection



	    