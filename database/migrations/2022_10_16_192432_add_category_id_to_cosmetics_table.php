<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToCosmeticsTable extends Migration
{

    public function up()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();
        });
    }


    public function down()
    {
        Schema::table('cosmetics', function (Blueprint $table) {
            $table->dropForeign('cosmetics_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
