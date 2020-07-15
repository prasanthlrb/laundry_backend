<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id');
            $table->string('date')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('pickup_driver_id')->nullable();
            $table->string('delivery_driver_id')->nullable();
            $table->string('total');
            $table->string('payment_type');
            $table->string('pickup_date');
            $table->string('pickup_time');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('address_id')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
