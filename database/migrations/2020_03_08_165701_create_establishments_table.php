<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('status'); 

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            
            $table->unsignedBigInteger('country_id');     
            $table->foreign('country_id')->references('id')->on('countries')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            
            $table->unsignedBigInteger('region_id');  
            $table->foreign('region_id')->references('id')->on('regions')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('city_id'); 
            $table->foreign('city_id')->references('id')->on('cities')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');

            $table->unsignedBigInteger('zone_id');                              
            $table->foreign('zone_id')->references('id')->on('zones')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');                                     
            $table->string('name', 100);
            $table->string('latitude')->nullable();
            $table->string('length')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('reservation_email', 100)->nullable()->unique();
            $table->string('logo')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('publish_on_the_web')->default(false);
            $table->boolean('admit_reservation')->default(false);
            $table->integer('linear_discount')->unsigned();
            $table->text('menu')->nullable();   
            $table->text('description')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('establishments');
    }
}
