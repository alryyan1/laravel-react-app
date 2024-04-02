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
        Schema::create('main_tests', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('main_test_name', 70);
            $table->integer('pack_id')->nullable()->index('pakid_fk');
            $table->boolean('pageBreak')->default(false);
            $table->integer('container_id')->default(1)->index('cntainer_fk');
            $table->float('lab_perc', 10, 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_tests');
    }
};
