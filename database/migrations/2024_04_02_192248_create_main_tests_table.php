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
            $table->id('id');
            $table->string('main_test_name', 70);
            $table->integer('pack_id')->nullable()->index('pakid_fk');
            $table->boolean('pageBreak')->default(false);
            $table->integer('container_id')->default(1)->index('cntainer_fk');
            $table->float('price', 10, 1)->nullable( );
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
