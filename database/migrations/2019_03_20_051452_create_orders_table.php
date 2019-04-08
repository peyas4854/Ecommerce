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
            $table->increments('id');

             $table->integer('user_id')->unsigned()->nullable();

             $table->foreign('user_id')->references('user_id')->on('members')->onDelete('cascade');

            $table->string('ip_address');
            $table->string('name');
            $table->string('phone_no');
            $table->text('shipping_address');

            $table->string('email');
            $table->integer('payment_id');
            $table->text('message');
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_complete')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            
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
