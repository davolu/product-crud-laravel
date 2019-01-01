<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
});


Route::get('register', function () {
    return view('register');
});



Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');




//user auths 

Route::post('/login', [
     
    'uses' => 'UserController@loginview',
    'as' => 'user.loginview'
    
    
    ]);

    Route::post('/dashboard', [
     
        'uses' => 'UserController@getDashboard',
        'as' => 'user.dashboard'
        
        
        ]);

    Route::post('/register', [
     
        'uses' => 'UserController@RegisterUser',
        'as' => 'user.register'
        
        
        ]);
    
        Route::post('/dologin', [
     
            'uses' => 'UserController@doLogin',
            'as' => 'user.dologin'
            
            
            ]);
       
 
    Route::get('/logout', [
     
    'uses' => 'UserController@doLogout',
    'as' => 'user.logout'
    
    
    ]);






         



//categorys crud

Route::get('managecategory', [
     
    'uses' => 'CategoryController@index',
    'as' => 'view.managecategory'
    ])->middleware('auth');


 

Route::get('addcategory', [
     
    'uses' => 'CategoryController@create',
    'as' => 'form.addcategory'
    ])->middleware('auth');
    
    
    Route::post('submitaddcategory', [
     
        'uses' => 'CategoryController@store',
        'as' => 'action.addcategory'
        ])->middleware('auth');
        
        
            
        
        Route::post('submitupdatecategory', [
     
            'uses' => 'CategoryController@update',
            'as' => 'action.updatecategory'
            ])->middleware('auth');
            
     
            
        Route::post('deletecategory', [
     
            'uses' => 'CategoryController@destroy',
            'as' => 'user.deletecategory'
            ])->middleware('auth');
    
                
         
             



//products crud

Route::get('manageproduct', [
     
    'uses' => 'ProductController@index',
    'as' => 'view.manageproduct'
    ])->middleware('auth');


 

Route::get('addproduct', [
     
    'uses' => 'ProductController@create',
    'as' => 'form.addproduct'
    ])->middleware('auth');
    
    
    Route::post('submitaddproduct', [
     
        'uses' => 'ProductController@store',
        'as' => 'action.addproduct'
        ])->middleware('auth');
        
        
            
        
        Route::post('submitupdateproduct', [
     
            'uses' => 'ProductController@update',
            'as' => 'action.updateproduct'
            ])->middleware('auth');
            
     
            
        Route::post('deleteproduct', [
     
            'uses' => 'ProductController@destroy',
            'as' => 'user.deleteproduct'
            ])->middleware('auth');
    
                
         
            