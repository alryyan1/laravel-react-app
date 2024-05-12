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
        Schema::table('labrequests', function (Blueprint $table) {
            $table->foreign(['main_test_id'], 'mantest_fk_id')->references(['id'])->on('main_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['pid'], 'pid_patients_id_fk')->references(['id'])->on('patients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labrequests', function (Blueprint $table) {
            $table->dropForeign('mantest_fk_id');
            $table->dropForeign('pid_patients_id_fk');
        });
    }
};
