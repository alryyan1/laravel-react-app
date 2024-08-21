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
        Schema::create('sysmex550', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->decimal('WBC', 10, 1);
            $table->decimal('RBC', 10, 1);
            $table->decimal('HGB', 10, 1);
            $table->decimal('HCT', 10, 1);
            $table->decimal('MCV', 10, 1);
            $table->decimal('MCH', 10, 1);
            $table->decimal('MCHC', 10, 1);
            $table->decimal('PLT', 10, 1);
            $table->decimal('NEUTP', 10, 1);
            $table->decimal('LYMPHP', 10, 1);
            $table->decimal('MONOP', 10, 1);
            $table->decimal('EOP', 10, 1);
            $table->decimal('BASOP', 10, 1);
            $table->decimal('NEUTC', 10, 1);
            $table->decimal('LYMPHC', 10, 1);
            $table->decimal('MONOC', 10, 1);
            $table->decimal('EOC', 10, 1);
            $table->decimal('BASOC', 10, 1);
            $table->decimal('IGP', 10, 1);
            $table->decimal('IGC', 10, 1);
            $table->decimal('RDWSD', 10, 1);
            $table->decimal('RDWCV', 10, 1);
            $table->decimal('MICROR', 10, 1);
            $table->decimal('MACROR', 10, 1);
            $table->decimal('PDW', 10, 1);
            $table->decimal('MPV', 10, 1);
            $table->decimal('PLCR', 10, 0);
            $table->decimal('PCT', 10, 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sysmex550');
    }
};
