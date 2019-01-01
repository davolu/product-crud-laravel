<?php
							

namespace App; 	


use Illuminate\Database\Eloquent\Model;		


class Product extends Model  	

{		

  
      protected $fillable =['name','description','price','category','image1','image2','by_user_id'];   

}
    //