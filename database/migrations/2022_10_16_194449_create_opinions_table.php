<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{

    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->text('opinion');
            $table->foreignId('user_id') ->nullable()->constrained()->nullOnDelete();
            $table->foreignId('cosmetic_id') ->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
