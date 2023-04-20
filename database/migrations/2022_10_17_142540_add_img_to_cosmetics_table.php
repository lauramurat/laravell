<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgToCosmeticsTable extends Migration
{
    public function up()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->text('img')->default('noimg');
        });
    }


    public function down()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->dropColumn('img');
        });
    }
}
