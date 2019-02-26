<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('name')->nullable(false);

            $table->string('thumbnail')->nullable();

            $table->string('product_code')->unique();

            $table->string('slug')->unique();

            $table->string('description', 800)->nullable();

            $table->string('content', 800)->nullable();

            $table->string('model')->nullable();

            $table->string('operation_system')->nullable();

            $table->string('cpu')->nullable();

            $table->string('monitor')->nullable();

            $table->string('ram')->nullable();

            $table->string('hdd')->nullable();

            $table->string('cd_dvd')->nullable();

            $table->string('card_video')->nullable();

            $table->string('card_audio')->nullable();

            $table->string('card_reader')->nullable();

            $table->string('webcam')->nullable();

            $table->string('finger_print')->nullable();

            $table->string('communications')->nullable();

            $table->string('port', 500)->nullable();

            $table->string('bluetooth')->nullable();

            $table->string('pin')->nullable();

            $table->string('weight')->nullable();

            $table->integer('category_id')->unsigned();

            $table->integer('view_count')->default(0);

            $table->integer('admin_creator_id')->unsigned();

            $table->integer('admin_updated_id')->unsigned();

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
