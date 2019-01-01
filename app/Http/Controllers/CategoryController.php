<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use Auth;

use App\User;

use Session;

 
class CategoryController extends Controller
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
 

        $getcategory = Category::where('by_user_id', $user->id)->orderBy('id', 'desc')->paginate(50);
      
            return  view('category.all', [
                                       'allcategory' => $getcategory


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
        return view('category.add');

 


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
'title' => 'required', 
'description' => 'required', 

                     
                  

              ]
          );
 
        

        
 
 
   
    



      $eloquentaddcategory = new Category([
                  
               'title' => $request->title, 
'description' => $request->description 
,
                'by_user_id' => $user->id 
              
          ]);


              $eloquentaddcategory->save();

               Session::flash('message', 'New Category Added Successfuly');  

               return redirect('managecategory');


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
    $row_id = $request->category_id;
    
        $category = category::findOrFail($row_id);
    
      $category->title = $request->title; 
$category->description = $request->description; 

    

        

        


   
    
 

              $category->save();

               Session::flash('message', 'New Category Updated Successfuly');  

               return redirect('managecategory');


 }
  


   public function destroy(Request $request)
                    {


                    $category = Category::find($request->category_id);
                    $category->delete();

                    Session::flash('message', 'Category has been removed sucessfully');  



                    return redirect('managecategory');
         

                     } 






}

    