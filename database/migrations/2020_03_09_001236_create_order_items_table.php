<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('order_id');
            $table->string('item_id');
            $table->string('qty');
            $table->string('laundry_price')->nullable();
            $table->string('dry_clean_price')->nullable();
            $table->string('iron_price')->nullable();
            $table->string('express_laundry_price')->nullable();
            $table->string('express_dry_clean_price')->nullable();
            $table->string('express_iron_price')->nullable();
            $table->string('total');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
