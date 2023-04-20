<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgToOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->text('img')->default('noimg');
        });
    }

    public function down()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropColumn('img');
        });
    }
}
