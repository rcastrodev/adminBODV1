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
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->unsignedBigInteger('brands_id');
            $table->foreign('brands_id')->references('id')->on('brands')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->integer('status', 20)->unsigned(); 
            $table->unsignedBigInteger('gastronomy_id');
            $table->foreign('gastronomy_id')->references('id')->on('gastronomies')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->unsignedBigInteger('country_id');                            
            $table->foreign('country_id')->references('id')->on('countries')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->unsignedBigInteger('region_id');  
            $table->foreign('region_id')->references('id')->on('regions')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->unsignedBigInteger('city_id', 20);  
            $table->foreign('city_id')->references('id')->on('cities')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->unsignedBigInteger('zone_id');                              
            $table->foreign('zone_id')->references('id')->on('zones')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->string('name', 100);
            $table->text('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('length')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('reservation_email', 100)->nullable()->unique();
            $table->string('logo')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('publish_on_the_web')->default(false);
            $table->boolean('admit_reservation')->default(false);
            $table->integer('linear_discount', 20)->unsigned();;
            $table->text('description')->nullable();
            $table->text('menu')->nullable();   
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
