<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticsTable extends Migration
{

    public function up()
    {
        Schema::create('cosmetics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('composition');
            $table->integer('price');
            $table->foreignId('user_id')->nullable()->constrained();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cosmetics');
    }
}
