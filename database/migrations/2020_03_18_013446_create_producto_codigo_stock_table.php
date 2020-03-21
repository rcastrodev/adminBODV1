<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoCodigoStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_codigo_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('producto_id')->nullable();
            $table->string('estatus')->nullable();
            $table->string('localizador')->nullable();
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
        Schema::dropIfExists('producto_codigo_stock');
    }
}
