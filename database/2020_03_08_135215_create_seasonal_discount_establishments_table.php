<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonalDiscountEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasonal_discount_establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id', 20);
            $table->foreign('establishment_id')->references('id')->on('establishments')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->time('time_since')->nullable();
            $table->time('time_until')->nullable();
            $table->integer('monday', 20)->nullable();
            $table->integer('tuesday', 20)->nullable();
            $table->integer('wednesday', 20)->nullable();
            $table->integer('thursday', 20)->nullable();
            $table->integer('friday', 20)->nullable();
            $table->integer('saturday', 20)->nullable();
            $table->integer('sunday', 20)->nullable();                     
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
        Schema::dropIfExists('seasonal_discount_establishments');
    }
}
