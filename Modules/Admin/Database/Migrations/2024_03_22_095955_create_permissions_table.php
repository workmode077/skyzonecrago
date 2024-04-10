<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
  
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title', 125);
			$table->string('slug', 125);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
