<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('producto_padre')->nullable();
            $table->integer('tipo_producto_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('coin_id')->nullable();
            $table->boolean('estatus')->nullable();
            $table->longText('description')->nullable();
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->string('logo')->nullable();
            $table->string('imagen_principal')->nullable();
            $table->boolean('publicado_web')->nullable();
            $table->integer('coin_publico_id')->nullable();
            $table->float('publico_precio', 20, 2)->nullable();
            $table->boolean('publico_gratis')->nullable();
            $table->boolean('public_na')->nullable();
            $table->integer('coin_afiliado_id')->nullable();
            $table->float('afiliado_precio', 20, 2)->nullable();
            $table->boolean('afiliado_gratis')->nullable();
            $table->boolean('afiliado_na')->nullable();
            $table->timestamp('fecha_producto')->nullable();
            $table->string('hora_producto')->nullable();
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
