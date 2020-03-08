<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->integer('order');
            $table->string('name');
            $table->string('ruta');                    
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
        Schema::dropIfExists('gallery_establishments');
    }
}
