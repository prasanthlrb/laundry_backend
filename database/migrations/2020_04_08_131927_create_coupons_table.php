<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code');
            $table->string('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('discount_type');
            $table->string('service_id')->nullable();
            $table->string('amount');
            $table->string('max_value')->nullable();
            $table->string('min_order_value')->nullable();
            $table->string('limit_per_user')->nullable();
            $table->string('limit_per_coupon')->nullable();
            $table->string('user_type')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
