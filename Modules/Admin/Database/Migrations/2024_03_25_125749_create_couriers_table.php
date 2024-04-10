<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('customer_name')->nullable();
            $table->text('product_detail')->nullable();
            $table->text('product_weight')->nullable();
            $table->text('from_address')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('pickup_note')->nullable();
            $table->text('booked_note')->nullable();
            $table->text('on_his_way_note')->nullable();
            $table->text('at_destination_note')->nullable();
            $table->text('out_of_delivery_note')->nullable();
            $table->text('delivered_note')->nullable();
            $table->text('cancel_note')->nullable();
            $table->text('shipping_method')->nullable();
            $table->tinyInteger('status')->default(0)->comment('1-active,0-Inactive')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('couriers');
    }
}
