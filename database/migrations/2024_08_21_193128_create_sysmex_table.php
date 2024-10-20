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
        Schema::create('sysmex', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->decimal('wbc', 10, 1);
            $table->decimal('rbc', 10, 1);
            $table->decimal('hgb', 10, 1);
            $table->decimal('hct', 10, 1);
            $table->integer('mcv');
            $table->integer('mch');
            $table->integer('mchc');
            $table->integer('plt');
            $table->integer('lym_p');
            $table->decimal('mxd_p', 10, 1);
            $table->integer('neut_p');
            $table->decimal('lym_c', 10, 1);
            $table->decimal('mxd_c', 10, 1);
            $table->decimal('neut_c', 10, 1);
            $table->decimal('rdw_sd', 10, 1);
            $table->decimal('rdw_cv', 10, 1);
            $table->decimal('pdw', 10, 1);
            $table->decimal('mpv', 10, 1);
            $table->decimal('plcr', 10, 1);
            $table->integer('flag');
            $table->decimal('mono_p', 10);
            $table->double('eos_p', 10, 2);
            $table->double('baso_p', 10, 2);
            $table->double('mono_abs', 10, 2);
            $table->double('eso_abs', 10, 2);
            $table->double('baso_abs', 10, 2);
            $table->integer('MICROR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sysmex');
    }
};
