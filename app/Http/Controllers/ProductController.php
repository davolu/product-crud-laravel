<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

 
class ProductController extends Controller
{
 
 

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $user = Auth::user();
 

        $getproduct = Product::where('by_user_id', $user->id)->orderBy('id', 'desc')->paginate(50);
        $getcategories = \App\Category::all();
      
            return  view('product.all', [
                                       'allproduct' => $getproduct,
                                       'allcategories' => $getcategories


                                       ] );


 
    }



 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $getcategories = \App\Category::all();
    //    return view('product.add');

        
        return  view('product.add', [
             'allcategories' => $getcategories


            ] );


 


    }



    	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   

        $user = Auth::user();

          $this->validate($request, 
                  [
'name' => 'required', 
'description' => 'required', 
'price' => 'required', 
'category' => 'required', 
'image1' => 'mimes:jpeg,bmp,png,pdf,jpg', 
'image2' => 'mimes:jpeg,bmp,png,pdf,jpg' 

                     
                  

              ]
          );
 
        

         $image1url="";
          

          if(request()->image1)
          {

              $image1url = time().'.'.request()->image1->getClientOriginalExtension();

              request()->image1->move(public_path('img/uploads'), $image1url);

          }
        else{

        	        $image1url = $request->image1_update;
        }

 
 $image2url="";
          

          if(request()->image2)
          {

              $image2url = time().'.'.request()->image2->getClientOriginalExtension();

              request()->image2->move(public_path('img/uploads'), $image2url);

          }
        else{


        	        $image2url = $request->image2_update;


        }

  


      $eloquentaddproduct = new Product([
                  
'name' => $request->name, 
'description' => $request->description, 
'price' => $request->price, 
'category' => $request->category, 
'image1' => $image1url, 
'image2' => $image2url,
'by_user_id' => $user->id
              
          ]);



              $eloquentaddproduct->save();

               Session::flash('message', 'New Product Added Successfuly');  

               return redirect('manageproduct');


 }
  




  	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
   

        $user = Auth::user();
    $row_id = $request->product_id;
    
        $product = product::findOrFail($row_id);
    
      $product->name = $request->name; 
$product->description = $request->description; 
$product->price = $request->price; 
$product->category = $request->category; 

    

        

         $image1url="";
          

          if(request()->image1)
          {

              $image1url = time().'.'.request()->image1->getClientOriginalExtension();

              request()->image1->move(public_path('img/uploads'), $image1url);

          }
        else{

        	        $image1url = $request->image1_update;
        }

 
 $image2url="";
          

          if(request()->image2)
          {

              $image2url = time().'.'.request()->image2->getClientOriginalExtension();

              request()->image2->move(public_path('img/uploads'), $image2url);

          }
        else{


        	        $image2url = $request->image2_update;


        }

 
















   $product->image2 = $image2url; 
    
 

              $product->save();

               Session::flash('message', 'New Product Updated Successfuly');  

               return redirect('manageproduct');


 }
  


   public function destroy(Request $request)
                    {


                    $product = Product::find($request->product_id);
                    $product->delete();

                    Session::flash('message', 'Product has been removed sucessfully');  



                    return redirect('manageproduct');
         

                     } 






}

    