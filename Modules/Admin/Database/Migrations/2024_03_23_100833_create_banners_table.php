<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->text('title')->nullable();
            $table->text('image')->nullable();
            $table->text('top_speed')->nullable();
            $table->text('top_speed_icon')->nullable();
            $table->text('mileage')->nullable();
            $table->text('mileage_icon')->nullable();
            $table->text('feature_one')->nullable();
            $table->text('feature_one_icon')->nullable();
            $table->text('feature_two')->nullable();
            $table->text('feature_two_icon')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
