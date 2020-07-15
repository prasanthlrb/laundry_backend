<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
            $table->string('category_read')->nullable();
            $table->string('category_edit')->nullable();
            $table->string('category_del')->nullable();
            $table->string('services_read')->nullable();
            $table->string('services_edit')->nullable();
            $table->string('services_del')->nullable();
            $table->string('customer_read')->nullable();
            $table->string('customer_edit')->nullable();
            $table->string('customer_del')->nullable();
            $table->string('user_read')->nullable();
            $table->string('user_edit')->nullable();
            $table->string('user_del')->nullable();
            $table->string('role_read')->nullable();
            $table->string('role_edit')->nullable();
            $table->string('role_del')->nullable();
            $table->string('order_read')->nullable();
            $table->string('order_edit')->nullable();
            $table->string('order_del')->nullable();
            $table->string('coupon_read')->nullable();
            $table->string('coupon_edit')->nullable();
            $table->string('coupon_del')->nullable();
            $table->string('agent_read')->nullable();
            $table->string('agent_edit')->nullable();
            $table->string('agent_del')->nullable();
            $table->string('slider_read')->nullable();
            $table->string('slider_edit')->nullable();
            $table->string('slider_del')->nullable();
            $table->string('order_report')->nullable();
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
        Schema::dropIfExists('roles');
    }
}
