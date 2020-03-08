<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_opening_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id', 20);
            $table->foreign('establishment_id')->references('id')->on('establishments')
                                        ->onDelete('set null')
                                        ->onUpdate('cascade');
            $table->string('day', 20);
            $table->time('time_since');
            $table->time('time_until');                    
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
        Schema::dropIfExists('establishment_opening_hours');
    }
}
