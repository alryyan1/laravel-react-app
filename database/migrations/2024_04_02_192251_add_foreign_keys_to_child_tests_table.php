<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('child_tests', function (Blueprint $table) {
            $table->foreign(['main_id'], 'main_id_fk')->references(['id'])->on('main_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['Unit'], 'unit_FK')->references(['id'])->on('units')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('child_tests', function (Blueprint $table) {
            $table->dropForeign('main_id_fk');
            $table->dropForeign('unit_FK');
        });
    }
};
