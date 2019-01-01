<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
  $table->text("name")->nullable(); 
  $table->text("description")->nullable(); 
  $table->text("price")->nullable(); 
  $table->text("category")->nullable(); 
  $table->text("image1")->nullable(); 
  $table->text("image2")->nullable(); 



            $table->text("by_user_id")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}




            