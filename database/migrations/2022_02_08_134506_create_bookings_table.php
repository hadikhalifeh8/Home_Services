<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->bigInteger('cst_province_id')->unsigned();
            
            $table->bigInteger('sprovider_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('subcategory_id')->unsigned();

            $table->dateTime('booking_date');



     $table->foreign('cst_province_id')->references('id')->on('provinces')->onDelete('cascade'); 
     $table->foreign('sprovider_id')->references('id')->on('users')->onDelete('cascade');  
     $table->foreign('category_id')->references('id')->on('_categories')->onDelete('cascade');
     $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
