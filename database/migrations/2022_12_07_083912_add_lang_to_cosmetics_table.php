<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangToCosmeticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('composition_kz')->nullable();
            $table->string('composition_en')->nullable();
            $table->string('composition_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->dropColumn('name_kz');
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');
            $table->dropColumn('composition_kz');
            $table->dropColumn('composition_en');
            $table->dropColumn('composition_ru');
        });
    }
}
