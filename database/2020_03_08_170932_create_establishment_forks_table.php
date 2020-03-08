<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentForksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_forks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->integer('monday')->nullable();
            $table->integer('tuesday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
            $table->integer('saturday')->nullable();
            $table->integer('sunday')->nullable();                     
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
        Schema::dropIfExists('establishment_forks');
    }
}
