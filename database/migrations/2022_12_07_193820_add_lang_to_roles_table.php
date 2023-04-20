<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangToRolesTable extends Migration
{

    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('role_kz')->nullable();
            $table->string('role_en')->nullable();
            $table->string('role_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('role_kz');
            $table->dropColumn('role_en');
            $table->dropColumn('role_ru');
        });
    }
}
