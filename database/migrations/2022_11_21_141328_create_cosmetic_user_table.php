<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticUserTable extends Migration
{

    public function up()
    {
        Schema::create('cosmetic_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cosmetic_id')->constrained();
            $table->tinyInteger('rating');
            $table->timestamps() ;
        });
    }


    public function down()
    {
        Schema::dropIfExists('cosmetic_user');
    }
}
