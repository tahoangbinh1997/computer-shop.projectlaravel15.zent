<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_resolutions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();

            $table->integer('resolution_id')->unsigned();

            $table->enum('resolution_name',['1366 x 768', '1920 x 1080', '2560 x 1440', '3840 x 2160', '4096 x 2160']);

            $table->bigInteger('import_price')->nullable();

            $table->bigInteger('price')->nullable();

            $table->bigInteger('sale_price')->nullable();

            $table->integer('stock');

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
        Schema::dropIfExists('product_resolutions');
    }
}
